<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $name = $user->name;
        return view('admin.dashboard',['name'=>$name]);
    }
}
