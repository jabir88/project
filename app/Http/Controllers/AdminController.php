<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    public function dash()
    {
        $count=  User::all();
        $sendnum = count($count);
        return view('admin.dashboard.dashboardContent', compact('sendnum'));
    }
    public function permission()
    {
        echo "You have no permission!";
    }
}
