<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title, $text);
        return view('user');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($user) {
            Alert::success('Success', 'Successfully Added!');
        } else {
            Alert::error('Creation Error', "Can't Add Username");
        }

        return redirect(route('storeUser'));
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->delete();
            Alert::success('Success', 'Successfully Deleted!');
        } else {
            Alert::error('Delete Error', "Can't Delete user with ID " . $request->id);
        }

        return redirect(route('deleteUser'));
    }

    public function editUser(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->update([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
            ]);
            Alert::success('Success', 'Successfully Edited!');
        } else {
            Alert::error("Edit User Error", "Can't Find User.");
        }

        return redirect(route('user'));
    }

    public function datatable()
    {
        return DataTables::of(User::all())->addColumn('Actions', 'component.usertableaction')->rawColumns(['Actions'])->make(true);
    }
}
