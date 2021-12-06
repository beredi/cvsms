<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.employee.index', ['employees' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validated = $this->validate($request, [
             'name' => ['required', 'string', 'max:255'],
             'lastname' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);
        if ($validated){
           $user = User::create([
                'name' => $request['name'],
                'lastname' => $request['lastname'],
                'employed_from' => $request['employed_from'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'phone' => $request['phone'],
                'address' => $request['address']
            ]);
            session()->flash('employee-created', __('messages.admin.menu.employees.created_employee', ['name' => $user->name, 'lastname' => $user->lastname]));
        }

        return redirect(route('employees.all'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.employee.edit', ['employee' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['nullable', 'confirmed']
        ]);
        if($validated){
            $user->name = $request['name'];
            $user->lastname = $request['lastname'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->address = $request['address'];
            $user->employed_from = $request['employed_from'];
            if(!empty($request['password'])){
                $user->password = Hash::make($request['password']);
            }

            $user->save();
            session()->flash('employee-updated', __('messages.admin.menu.employees.updated_employee', ['name' => $user->name, 'lastname' => $user->lastname]));
        }
        return redirect(route('employees.all'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('employee-deleted', __('messages.admin.menu.employees.deleted_employee', ['name' => $user->name, 'lastname' => $user->lastname]));

        return redirect(route('employees.all'));
    }
}
