<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'min:2', 'max:60'],
            'last_name' => ['required', 'string', 'min:2', 'max:60'],
            'date_of_birthday' => ['required', 'string', 'max:10'],
            'phone' => ['required', 'string', 'max:12', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:24', 'confirmed'],
        ]);
    }

    public function index()
    {
        $users = User::paginate(5);
        return view('admin.index', [
            'users'  => $users,
        ]);
    }

    public function create()
    {
        return view('admin.create', [
            'user'  => [],
        ]);
    }

    public function store(Request $request)
    {
        if ($this->validator($request)->fails()) {
            return redirect('admin/create')
                ->withErrors($this->validator($request))
                ->withInput();
        } else {
            $usr = new User();
            $usr->first_name = $request->first_name;
            $usr->last_name = $request->last_name;
            $usr->date_of_birthday = $request->date_of_birthday;
            $usr->phone = $request->phone;
            $usr->email = $request->email;
            $usr->password = Hash::make($request->password);
            $usr->save();
            return redirect()->route('admin.index');
        }
    }

    public function show($id)
    {
        //
    }

    function edit($user)
    {
        $usr = User::find($user);
        return view('admin.edit', [
            'user'  => $usr,
        ]);
    }

    public function update(Request $request, $user)
    {
        $usr = User::find($user);
        $link = url()->current();
        if ($this->validator($request)->fails()) {
            return redirect($link.'/edit')
                ->withErrors($this->validator($request))
                ->withInput();
        } else {
            $usr->first_name = $request->first_name;
            $usr->last_name = $request->last_name;
            $usr->date_of_birthday = $request->date_of_birthday;
            $usr->phone = $request->phone;
            $usr->email = $request->email;
            $usr->password = Hash::make($request->password);
            $usr->save();
            return redirect()->route('admin.index');
        }
    }

    public function destroy($user)
    {
        $usr = User::find($user);
        $usr->delete();
        return redirect()->route('admin.index');
    }
}
