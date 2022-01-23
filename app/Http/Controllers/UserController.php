<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use Hamcrest\Core\Set;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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
        $users = (Auth::user()->cannot('viewAny', User::class)) ? User::where('id', Auth::user()->id)->get() : User::all();
        return view('admin.employee.index', ['employees' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        return view('admin.employee.create', ['roles' => Role::all()]);
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
             'role' => ['required']
         ],[
             'name.required' => __('messages.admin.validator.required', ['field' => __('messages.admin.menu.customers.customer.name')]),
             'lastname.required' => __('messages.admin.validator.required', ['field' => __('messages.admin.menu.customers.customer.lastname')]),
             'email.required' => __('messages.admin.validator.required', ['field' => __('messages.admin.menu.customers.customer.email')]),
             'email.unique' => __('messages.admin.validator.unique', ['field' => __('messages.admin.menu.customers.customer.email')]),
             'password.required' => __('messages.admin.validator.required', ['field' => __('messages.admin.menu.employees.employee.password')]),
             'password.min' => __('messages.admin.validator.min', ['field' => __('messages.admin.menu.employees.employee.password'), 'count' => '8']),
             'role.required' => __('messages.admin.validator.required', ['field' => __('messages.admin.menu.employees.employee.user-role')]),
         ]);
        if ($validated){
           $user = User::create([
                'name' => $request['name'],
                'lastname' => $request['lastname'],
                'employed_from' => $request['employed_from'],
                'employed_to' => $request['employed_to'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'phone' => $request['phone'],
                'address' => $request['address']
            ]);
            $user->role()->associate(Role::where(['slug' => $request['role']])->firstOrFail());
            $setting = new Setting();
            $setting->setLanguage('rs');
            $user->settings()->save($setting);
            $user->save();
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
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('admin.employee.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if($this->authorize('update', $user)){
            return view('admin.employee.edit', ['employee' => $user, 'roles' => Role::all()]);
        }
        else {
            throw new AuthorizationException('Not authorized');
        }
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
            'password' => ['nullable', 'confirmed'],
            'role' => ['nullable']
        ]);
        if($validated){
            $user->name = $request['name'];
            $user->lastname = $request['lastname'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->address = $request['address'];
            $user->employed_from = $request['employed_from'];
            $user->employed_to = $request['employed_to'];
            if(!empty($request['password'])){
                $user->password = Hash::make($request['password']);
            }
            if(!empty($request['role'])){
                if (!$user->hasRole($request['role'])) {
                    $user->role()->associate(Role::where(['slug' => $request['role']])->firstOrFail());
                }
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
        $this->authorize('delete', $user);
        $user->delete();
        session()->flash('employee-deleted', __('messages.admin.menu.employees.deleted_employee', ['name' => $user->name, 'lastname' => $user->lastname]));

        return redirect(route('employees.all'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws AuthorizationException
     */
    public function settings(User $user)
    {
        $this->authorize('update', $user);
        return view('admin.employee.settings', ['user' => $user]);
    }
}
