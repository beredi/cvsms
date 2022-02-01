<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Cassandra\Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Customer::class);
        return view('admin.customer.index', ['customers' => Customer::all()->sortByDesc('id')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Customer::class);
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required|min:6',
            'email' => 'required|email|unique:customers,email',
            'address' => 'required',
            'id_card' => 'nullable|integer|gt:0',
            'owe' => 'nullable|numeric'
        ],[
            'name.required' => __('messages.admin.validator.required', ['field' => __('messages.admin.menu.customers.customer.name')]),
            'lastname.required' => __('messages.admin.validator.required', ['field' => __('messages.admin.menu.customers.customer.lastname')]),
            'phone.required' => __('messages.admin.validator.required', ['field' => __('messages.admin.menu.customers.customer.phone')]),
            'email.required' => __('messages.admin.validator.required', ['field' => __('messages.admin.menu.customers.customer.email')]),
            'email.unique' => __('messages.admin.validator.unique', ['field' => __('messages.admin.menu.customers.customer.email')]),
            'address.required' => __('messages.admin.validator.required', ['field' => __('messages.admin.menu.customers.customer.address')]),
            'id_card.integer' => __('messages.admin.validator.integer', ['field' => __('messages.admin.menu.customers.customer.id_card')]),
            'id_card.gt' => __('messages.admin.validator.positive_number', ['field' => __('messages.admin.menu.customers.customer.id_card')]),
            'owe.numeric' => __('messages.admin.validator.numeric', ['field' => __('messages.admin.menu.customers.customer.owe')])
        ]);
        if ($validated){
            $customer = Customer::create($request->all());
            session()->flash('customer-created', __('messages.admin.menu.customers.created_customer', ['name' => $customer->name, 'lastname' => $customer->lastname]));
        }

        return redirect(route('customers.all'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $this->authorize('view', Customer::class);

        return view('admin.customer.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $this->authorize('update', Customer::class);
        return view('admin.customer.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required|min:6',
            'email' => 'required|email|unique:customers,email,'.$customer->id,
            'address' => 'required',
            'id_card' => 'nullable|integer|gt:0',
            'owe' => 'nullable|numeric'
        ],[
            'name.required' => __('messages.admin.validator.required', ['field' => __('messages.admin.menu.customers.customer.name')]),
            'lastname.required' => __('messages.admin.validator.required', ['field' => __('messages.admin.menu.customers.customer.lastname')]),
            'phone.required' => __('messages.admin.validator.required', ['field' => __('messages.admin.menu.customers.customer.phone')]),
            'email.required' => __('messages.admin.validator.required', ['field' => __('messages.admin.menu.customers.customer.email')]),
            'address.required' => __('messages.admin.validator.required', ['field' => __('messages.admin.menu.customers.customer.address')]),
            'id_card.integer' => __('messages.admin.validator.integer', ['field' => __('messages.admin.menu.customers.customer.id_card')]),
            'id_card.gt' => __('messages.admin.validator.positive_number', ['field' => __('messages.admin.menu.customers.customer.id_card')]),
            'owe.numeric' => __('messages.admin.validator.numeric', ['field' => __('messages.admin.menu.customers.customer.owe')])
        ]);
        if ($validated){
            $customer->update($request->all());
            session()->flash('customer-updated', __('messages.admin.menu.customers.updated_customer', ['name' => $customer->name, 'lastname' => $customer->lastname]));

        }


        return redirect(route('customers.all'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $this->authorize('delete', Customer::class);
        $customer->delete();
        session()->flash('customer-deleted', __('messages.admin.menu.customers.deleted_customer', ['name' => $customer->name, 'lastname' => $customer->lastname]));

        return redirect(route('customers.all'));
    }

    public function vehicleHandler(Request $request){
        $customer = Customer::findOrFail($request->get('customerID'));
        return response()->json(array($customer->vehiclesToArray()), 200);
    }
}
