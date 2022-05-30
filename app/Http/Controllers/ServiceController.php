<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service;
use App\Models\StockItem;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("viewAny", Service::class);

        return view("admin.service.index", [
            "services" => Service::all()->sortByDesc("id"),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize("create", Service::class);

        return view("admin.service.create", [
            "customers" => Customer::all()->sortBy("name"),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = Vehicle::findOrFail($request->get("vehicle"));
        $service = new Service();
        $service->vehicle()->associate($vehicle);
        $service->name = $request->get("name");
        $service->description = $request->get("description");
        $service->kilometers = $request->get("kilometers");
        $service->time_spent = $request->get("time_spent");
        $service->price = $request->get("price");
        $service->paid = $request->get("paid");
        $service->date = $request->get("date");
        $service->employee()->associate(Auth::user());

        // If customer didn't pay for service, set his 'owe'
        if ($service->price != $service->paid) {
            $customer = $service->customer();
            $customer->owe += $service->price - $service->paid;
            $customer->save();
        }

        $service->save();
        session()->flash(
            "service-created",
            __("messages.admin.menu.services.messages.service_created")
        );

        // Go back to service
        return redirect(route("services.show", ["service" => $service->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $this->authorize("view", $service);

        return view("admin.service.show", ["service" => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $this->authorize("update", $service);

        return view("admin.service.edit", [
            "service" => $service,
            "customers" => Customer::all()->sortBy("name"),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->authorize("update", $service);

        $vehicle = Vehicle::findOrFail($request->get("vehicle"));

        $service->vehicle()->associate($vehicle);
        $service->name = $request->get("name");
        $service->description = $request->get("description");
        $service->kilometers = $request->get("kilometers");
        $service->time_spent = $request->get("time_spent");
        $price = $request->get("price");
        $paid = $request->get("paid");
        $service->date = $request->get("date");
        $service->employee()->associate(Auth::user());

        // Recalculate customer owe
        if ($service->price != $price || $service->paid != $paid) {
            $customer = $service->customer();
            if ($service->price != $price && $service->paid == $paid) {
                $difference = $price - $service->price;
            } elseif ($service->price == $price && $service->paid != $paid) {
                $difference = $service->paid - $paid;
            } else {
                $difference =
                    -1 * ($service->price - $service->paid) + ($price - $paid);
            }
            $customer->owe += $difference;
            $customer->save();
        }

        $service->price = $price;
        $service->paid = $paid;

        $service->save();
        session()->flash(
            "service-updated",
            __("messages.admin.menu.services.messages.service_updated")
        );

        return redirect(route("services.all"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $service = Service::findOrFail($request->get("thing_id"));
        $this->authorize("delete", $service);

        $service->delete();
        session()->flash(
            "service-deleted",
            __("messages.admin.menu.services.messages.service_deleted")
        );

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function assignItemsToService(Request $request)
    {
        $service = Service::findOrFail($request->get("service_id"));
        $this->authorize("update", $service);
        $items = [];
        $quantities = [];
        foreach ($request->toArray() as $key => $value) {
            if (strpos($key, "item") !== false) {
                $items[] = $value;
            }
            if (strpos($key, "qty") !== false) {
                $quantities[] = $value;
            }
        }

        $errorQtyNames = [];
        $errorAttachedNames = [];

        foreach ($items as $key => $item_id) {
            $item = StockItem::findOrFail($item_id);
            if ($item->on_stock >= $quantities[$key]) {
                if (
                    !$service->stock_items()->find($item->id, ["stock_item_id"])
                ) {
                    $service
                        ->stock_items()
                        ->attach($item, ["pieces" => $quantities[$key]]);
                    $item->on_stock = $item->on_stock - $quantities[$key];
                    $item->save();
                } else {
                    $errorAttachedNames[] = $item->name;
                }
            } else {
                $errorQtyNames[] = $item->name;
            }
        }

        if (count($errorAttachedNames) > 0 || count($errorQtyNames) > 0) {
            $errorMessages = "";
            if (count($errorAttachedNames) > 0) {
                $errorMessages =
                    __(
                        "messages.admin.menu.services.messages.items-already-attached"
                    ) . implode(", ", $errorAttachedNames);
            }
            if (count($errorQtyNames) > 0) {
                if ($errorMessages !== "") {
                    $errorMessages .= "; ";
                }
                $errorMessages .=
                    __(
                        "messages.admin.menu.services.messages.items-qty-not-fit"
                    ) . implode(", ", $errorQtyNames);
            }
            session()->flash("items-errors", $errorMessages);
        }
        return redirect()->back();
    }

    /**
     * @param Service $service
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function detachItem(Service $service, Request $request)
    {
        $item = StockItem::findOrFail($request->get("item_id"));
        $pieces = $service
            ->stock_items()
            ->findOrFail($item->id, ["stock_item_id"])->pivot->pieces;
        $item->on_stock += $pieces;
        $item->save();

        $service->stock_items()->detach($item);

        return redirect()->back();
    }
}
