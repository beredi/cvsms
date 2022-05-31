<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Faker\Core\File;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // is_company_app_owner has to be false on every company except one company
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $this->authorize("update", Company::class);
        return view("admin.company.edit", ["company" => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $validated = $this->validate($request, [
            "name" => "required",
            "email" => "email|nullable",
            "logo" => "mimes:jpeg,bmp,png",
        ]);
        if ($validated) {
            if ($request->logo !== "") {
                $path = public_path() . "/img/companies/" . $company->id . "/";

                //code for remove old file
                if ($company->logo != "" && $company->file != null) {
                    $file_old = $path . $company->logo;
                    unlink($file_old);
                }

                //upload new file
                $file = $request->logo;
                $filename = $file->getClientOriginalName();
                $file->move($path, $filename);
            }

            $request->logo = $filename;
            $company->update([
                "name" => $request->name,
                "street" => $request->street,
                "street_number" => $request->street_number,
                "city" => $request->city,
                "zip" => $request->zip,
                "email" => $request->email,
                "logo" => $filename,
                "unique_number" => $request->unique_number,
                "pib" => $request->pib,
                "bank_account" => $request->bank_account,
            ]);
            /*session()->flash(
                "customer-updated",
                __("messages.admin.menu.customers.updated_customer", [
                    "name" => $customer->name,
                    "lastname" => $customer->lastname,
                ])
            );*/
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
