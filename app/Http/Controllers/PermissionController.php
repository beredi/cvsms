<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Service;
use App\Models\StockItem;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("viewAny", Permission::class);
        $permissions = [
            "user" => User::getPermissions(),
            "customers" => Customer::getPermissions(),
            "vehicles" => Vehicle::getPermissions(),
            "services" => Service::getPermissions(),
            "stock" => StockItem::getPermissions(),
            "company" => Company::getPermissions(),
        ];
        return view("admin.admin.permissions", [
            "roles" => Role::all(),
            "permissions" => $permissions,
            "userRole" => Role::where("slug", Role::USER)->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxHandler(Request $request)
    {
        $roleSlug = $request->get("roleSlug");
        $permissionsArray = Role::where("slug", $roleSlug)
            ->first()
            ->permissionsToArray();

        return response()->json($permissionsArray, 200);
    }

    public function roleAttach(Request $request)
    {
        $checkedPermissions = $request->get("permissions-checked");
        $role = Role::where("slug", $request->get("roleSlug"))->first();
        $role->permissions()->detach();

        foreach ($checkedPermissions as $rolePermission) {
            $role
                ->permissions()
                ->attach(Permission::where("slug", $rolePermission)->first());
        }

        session()->flash(
            "permissions-updated",
            __("messages.admin.permissions.updated-message")
        );

        return redirect()->back();
    }
}
