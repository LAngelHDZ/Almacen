<?php

namespace App\Http\Controllers\root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserstController extends Controller
{
    public function users(){
        return view('almacen.root.user');
    }

    public function create(){
        return view('almacen.root.createuser');
    }
}
