<?php

namespace App\Http\Controllers\root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserstController extends Controller
{
    public function index(){
        return view('almacen.root.user');
    }
}
