<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function Index(){
        return view ('admin.dashboard');
    }
    public function Category(){
        return view ('admin.category');
    }
}
