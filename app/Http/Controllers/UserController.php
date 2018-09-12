<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    public function index()
    {
        $allUser=User::where('status', '1')->orderBy('id', 'DESC')->get();
        return view('admin.user.all', compact('allUser'));
    }
    public function add()
    {
        return view('admin.user.add');
    }
    public function view($id)
    {
        $viewUser=User::where('id', $id)->first();
        return view('admin.user.view', compact('viewUser'));
    }
    public function edit($id)
    {
        $editUser=User::where('id', $id)->first();
        return view('admin.user.edit', compact('editUser'));
    }
    public function editpostsub()
    {
        $user_det =  User::findOrFail($_POST['id'])->update([
          'name' => $_POST['name']
        ]);
        return redirect()->route('user');
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user');
    }
}
