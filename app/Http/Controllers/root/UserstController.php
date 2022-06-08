<?php

namespace App\Http\Controllers\root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserstController extends Controller
{

    public function __construct(){
        $this->middleware('role:root');
    }
    
    public function users(){
        return view('almacen.root.user');
    }
    public function roles(){
        return view('almacen.root.roles');
    }
    public function permisos(){
        return view('almacen.root.permission');
    }

    public function create(){
        $view=false;
        return view('almacen.root.createuser',compact('view'));
    }

    public function update($id){
        $view=true;
        return view('almacen.root.createuser',compact('id','view'));
    }
}
