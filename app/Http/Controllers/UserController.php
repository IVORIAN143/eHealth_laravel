<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use function Laravel\Prompts\text;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title,$text);
        return view('user');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'username'=> 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'username'=> $request->username,
            'role' => $request->role,
            'email' => $request->email,
            'password'=>$request->password,
        ]);

        if(is_null($user))
            Alert::error("Creation Error", "Can't Add Username");
        else
            Alert::success('Success', 'Successfuly Added!.');
        return redirect(route('storeUser'));
    }

    public function delete(Request $request){
        $user = User::where('id', $request->id)->first();
        if(is_null($user))
        {
            Alert::error('Delete Error', "Can't Delete username with id".$request->id);
        }
        $user->delete();
        Alert::success('Success', 'Successfuly Delete!.');
        return redirect(route('deleteUser'));

    }

    public function editUser(Request $request){
        $target = User::where('id', $request->id);
        if(is_null($target))
            Alert::error("Edit User Error", "Can't Find User.");
        else{
            $target->update([
                'username'=>$request->username,
                'email'=>$request->email,
                'role'=>$request->role,
            ]);
            Alert::success('Success', 'Successfuly Edited!.');
            return redirect(route('user'));

        }
    }

    public function datatable()
    {
        return DataTables::of(User::all())->addColumn('Actions', 'component.usertableaction')->rawColumns(['Actions'])->make(true);
    }
}

