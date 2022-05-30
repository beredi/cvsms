<?php

namespace App\Http\Controllers;

use App\Models\StockItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("viewAny", StockItem::class);

        return view("admin.stock.index", [
            "items" => StockItem::all()->sortByDesc("id"),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize("create", StockItem::class);

        return view("admin.stock.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize("create", StockItem::class);
        $validated = $this->validate($request, [
            "on_stock" => "required|gt:0",
            "price" => "required|gt:0",
            "purchase_price" => "required|gt:0",
        ]);

        if ($validated) {
            StockItem::create($request->all());
            session()->flash(
                "stock-item-created",
                __("messages.admin.menu.stock.created-item")
            );
        }

        return redirect(route("stock-item.all"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StockItem  $stockItem
     * @return \Illuminate\Http\Response
     */
    public function show(StockItem $stockItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StockItem  $stockItem
     * @return \Illuminate\Http\Response
     */
    public function edit(StockItem $stockItem)
    {
        $this->authorize("update", StockItem::class);

        return view("admin.stock.edit", ["item" => $stockItem]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StockItem  $stockItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockItem $stockItem)
    {
        $this->authorize("update", StockItem::class);

        $validated = $this->validate($request, [
            "on_stock" => "required|gt:0",
            "price" => "required|gt:0",
            "purchase_price" => "required|gt:0",
        ]);
        if ($validated) {
            $stockItem->update($request->all());
            session()->flash(
                "stock-item-updated",
                __("messages.admin.menu.stock.updated-item")
            );
        }

        return redirect(route("stock-item.all"));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request)
    {
        $this->authorize("delete", StockItem::class);

        $stockItem = StockItem::findOrFail($request->get("thing_id"));

        $stockItem->delete();
        session()->flash(
            "stock-item-deleted",
            __("messages.admin.menu.stock.deleted-item")
        );

        return redirect()->back();
    }

    public function getItemsJSON(Request $request)
    {
        $where = "%" . $request->get("characters") . "%";
        $stockItems = DB::table("stock_items")
            ->where("name", "like", $where)
            ->where("on_stock", "!=", 0)
            ->get();
        $preparedArray = [];
        foreach ($stockItems as $item) {
            if ($item) {
                $preparedArray[] = [
                    "code" => $item->id,
                    "name" => $item->name,
                ];
            }
        }

        return response()->json($preparedArray, 200);
    }

    public function getItemQtyByID(Request $request)
    {
        $stockItem = StockItem::all()
            ->where("id", "=", $request->get("itemID"))
            ->first();

        return response()->json($stockItem->on_stock, 200);
    }
}
