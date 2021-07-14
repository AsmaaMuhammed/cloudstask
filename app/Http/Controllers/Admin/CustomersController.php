<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');

    }//end of constructor

    public function index(Request $request)
    {
        $customers = User::customer()->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');

            });

        })->latest()->paginate(5);

        return view('admin.customers.index', compact('customers'));

    }//end of index

    public function edit(User $customer)
    {
        return view('admin.customers.edit', compact('customer'));

    }//end of user

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            //'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)]
        ]);
        $data = $request->all();
        if(!isset($data['active']))
            $data['active'] = 0;

        $user->update($data);

        return redirect()->route('customers.index')->with('success_message', 'customer updateds successfully');

    }//end of update

    public function destroy(User $user)
    {
        //dd($user);
        $user->delete();
        return redirect()->route('customers.index')->with('success_message', 'customer deleted successfully');

    }//end of destroy

    public function changeActive(User $user)
    {
        $active = $user->active === 0 ? 1 : 0;
        $user->update(['active' => $active]);
        return redirect()->route('customers.index')->with('success_message', 'customer updated successfully');

    }//end of changeActiveStatus
}
