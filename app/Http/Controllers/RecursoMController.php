<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class RecursoMController extends Controller
{

    public function __construct(){
        $this->middleware('permission:rm.dashboard.index');
    }
    
    public function catalogo(){

        return view('almacen.catalogo');
    }

    public function proveedor(){

        return view('almacen.proveedor');
    }

    public function producto(){
        $view=false;
        return view('almacen.producto',compact('view'));
    }

    public function precios($id){

        $view=true;
        $producto= Productos::where('id',$id)->get();

        return view('almacen.producto',compact('view','producto'));

    }

    public function requisicionesP(){
        return view('almacen.recursosM.requisicionesrm');

    }
    public function historial(){
        return view('almacen.recursosM.historialRm');

    }

    
}
