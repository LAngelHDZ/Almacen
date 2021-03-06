<?php

namespace App\Http\Livewire\Almacen\Almacenes;


use App\Models\stock;
use App\Models\factura;
use Livewire\Component;
use App\Models\Proveedor;
use App\Models\solicitud;
use App\Models\materiales;
use App\Models\msmestatus;
use Livewire\WithPagination;
use App\Models\status_solicitud;
use App\Models\productos_factura;
use Illuminate\Support\Facades\DB;
use App\Events\RealtimeEventSolicitud;
use App\Traits\DateFunctions;

class RequisicionesAlmacen extends Component
{
    use WithPagination;
    use DateFunctions;
    public $products = [];
    public $Validateproducts = [];
    public $openbtn = true;
    public $active = true;
    public $queryproductos = false;
    public $solicitudes = [];
    public $id_solicitud, $aux;
    /*Variables para guardar nueva factura */
    public $nfactura, $idproveedor, $fecha, $descripcion;
    public $factura, $alert;
    public $status, $filter_status = 'Revisada';
    public $seguimiento = [];
    protected $listeners = ['echo:solicitud,RealtimeEventSolicitud' => 'updateview'];


    public function QuerySolicitud()
    {
        $filter = 'Transito';
        $status = true;
        $list = solicitud::join('empleados', 'empleados.id', '=', 'solicituds.id_empleado')
            ->join('users', 'users.id', '=', 'empleados.id_user')
            ->join('status_solicituds as status', '.id_solicitud', '=', 'solicituds.id')
            ->select('solicituds.id', 'solicituds.folio', 'solicituds.descripcion', 'empleados.id_user', 'users.name')
            ->where(function ($query) use ($filter, $status) {
                $query->where('status.status', $filter)
                    ->where('solicituds.state', $status);
            })
            ->Orderby('status.date', 'desc')->Orderby('status.time', 'desc')
            ->paginate(5);

        foreach ($list as $data) {
            $this->solicitudes[] = [
                'id' => $data->id,  //id de solicitud
                'folio' => $data->folio,  //folio de la solicitud
                'dateA' => $this->values($data->id, 'dateA'),  //metodo a la cual le paso el id de solicitud para que muestre ciertas fechas de status en espa??ol
                'dateC' => $this->values($data->id, 'dateC'),  //metodo a la cual le paso el id de solicitud para que muestre ciertas fechas de status en espa??ol
                'status' => $this->getstatus(status_solicitud::select('status')->where('id_solicitud', $data->id)->get()),
                'descripcion' => $this->descripcion($data->id,), //metodo que le paso el id de solicitud para que me consulte la descripcion e los status
            ];
        }
        return $list;
        $this->aux = solicitud::count();
    }

    public function facturado($array)
    {
        productos_factura::create($array);
    }

    public function stock($index)
    {
        $id_empleado = solicitud::select('id_empleado')->where('id', $this->id_solicitud)->get();
        foreach ($this->products as $in => $data) {
            if ($index == $in) {
                $count =  stock::where('id_producto', $data['idprod'])->count();
                $count2 =  materiales::where('id_producto', $data['idprod'])->where('id_empleado', $id_empleado[0]->id_empleado)->count();
                $array = array(
                    'id_factura' => $this->factura,
                    'id_producto' => $data['idprod'],
                    'id_solicitud' => $data['idsol'],
                    'cantidad' => $data['alta'],
                );
                $this->facturado($array);
                if ($count == 0) {
                    stock::create([
                        'id_producto' => $data['idprod'],
                        'stock' => $data['alta'],
                    ]);
                } else {
                    $stock = stock::select('stock')->where('id_producto', $data['idprod'])->get();
                    $stock = $stock[0]->stock + $data['alta'];
                    DB::table('stocks')->where('id_producto', $data['idprod'])->update(['stock' => $stock]);
                }
                if ($count2 == 0) {
                    materiales::create([
                        'id_empleado' => $id_empleado[0]->id_empleado,
                        'id_producto' => $data['idprod'],
                        'stock' => $data['alta'],
                    ]);
                } else {
                    $stockm = materiales::select('stock')->where('id_producto', $data['idprod'])
                        ->where('id_empleado', $id_empleado[0]->id_empleado)->get();
                    $stockf = $stockm[0]->stock + $data['alta'];
                    DB::table('materiales')->where('id_producto', $data['idprod'])
                        ->where('id_empleado', $id_empleado[0]->id_empleado)->update(['stock' => $stockf]);
                }
                break;
            }
        }
        $this->active = true;
    }

    public function create_factura()
    {
        if (factura::where('no_factura', $this->nfactura)->count() == 0) {

            factura::create([
                'no_factura' => $this->nfactura,
                'idproveedor' => $this->idproveedor,
                'descripcion' => $this->descripcion,
                'fecha_elaboracion' => $this->fecha,
            ]);
            $this->factura = factura::select('no_factura')->latest('id')->first()->no_factura;
            $message = 'Factura capturada exitosamente';
            session()->flash('message', $message);
            // session()->flush();
        }
        $this->active = false;
    }

    public function search_f()
    {

        $count =   factura::where('no_factura', $this->factura)->count();


        if ($count > 0) {
            $messages = 'Factura existente';
            $this->alert = true;
        } else {
            $messages = 'No existe una factura con el No.' . $this->factura;
            $this->alert = false;
        }
        $this->emit('alert', $messages);
        session()->flash('messages', $messages);

        $this->active = false;
    }

    public function flashdelete()
    {
        session()->forget(['messages', 'message']);
    }

    public function getstatus($status)
    {

        foreach ($status as $index => $data) {
            if ($data->status == 'Transito') {
                $status = 'En transito';
                break;
            }
            if ($data->status == 'Almacen') {
                $status = 'Completado';
                break;
            }
        }
        return $status;
    }

    public function descripcion($id)
    {
        $des = status_solicitud::select('descripcion', 'status')->where('id_solicitud', $id)->get();
        foreach ($des as $index => $data) {
            if ($data->status == 'Transito') {

                return   $auxiliar = msmestatus::select('descripcion')->where('id', $data->descripcion)->get()[0]->descripcion;

                break;
            }
        }
    }

    public function values($id, $atribute)
    {
        $des = status_solicitud::select('date', 'status')->where('id_solicitud', $id)->get();
        $value = null;
        foreach ($des as $index => $data) {
            if ($data->status == 'Enviada' && $atribute == 'dateA') {
                $value =  $this->formatdate($value);
                break;
            }

            if ($data->status == 'Cerrada' && $atribute == 'dateC') {
                $value =  $this->formatdate($value);
                break;
            }
        }
        return $value;
    }

    public function querydate()
    {
        $this->reset([
            'solicitudes',
        ]);

        foreach ($this->QuerySolicitud() as $data) {
            $this->solicitudes[] = [
                'date' => $this->formatdate(status_solicitud::select('date')->where('id_solicitud', $data->id)->latest('id')->first()->date),
                'status' => status_solicitud::select('status')->where('id_solicitud', $data->id)->latest('id')->first()->status,
                'time' => status_solicitud::select('time')->where('id_solicitud', $data->id)->latest('id')->first()->time,
            ];
        }
    }

    public function filterquery($var)
    {
        $this->reset([
            'filter_status',
        ]);

        switch ($var) {
            case 2:
                $this->filter_status = 'Revisada';
                break;
            case 3:
                $this->filter_status = 'Aprobada';
                break;
            case 4:
                $this->filter_status = 'Rechazada';
                break;
            case 5:
                $this->filter_status = 'Transito';
                break;
            default:
                $this->filter_status = 'Almacen';
                break;
        }
    }

    public function seguimiento()
    {
        $this->reset([
            'seguimiento',
        ]);
        foreach ($this->QuerySolicitud() as $data) {
            $this->seguimiento[] = [
                'status' => $this->status_seguimiento(status_solicitud::select('status')->where('id_solicitud', $data->id)->get(), 'status'),
                'icon' => $this->status_seguimiento(status_solicitud::select('status')->where('id_solicitud', $data->id)->get(), 'icon'),
            ];
        }
    }



    public function updateview()
    {
        if (solicitud::count() != $this->aux) {
            $this->reset([
                'solicitudes',
            ]);
            $this->QuerySolicitud();
        }
    }

    public function product_aprobado()
    {
        foreach ($this->products as $data) {
            $aprobado = array('aprobado' => $data['aprobado']);

            DB::table('solicitud_productos')->where('id', $data['id'])->update($aprobado);
            $aprobado = null;
        }
    }

    public function aceptar()
    {
        $id_descripcion = msmestatus::select('id')->where('typestatus', 'Almacen')->get();
        $status = 'Almacen';
        status_solicitud::create([
            'id_solicitud' => $this->id_solicitud,
            'status' => $status,
            'descripcion' => $id_descripcion[0]->id,
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
        ]);

        event(new RealtimeEventSolicitud);

        $this->closemodal();
        $this->resetdatos();
    }

    public function inforeq($id)
    {
        $this->id_solicitud = $id;

        $this->queryproductos = true;


        //  $this->openbtn=false;
        $status = status_solicitud::select('status')->where('id_solicitud', $id)->latest('id')->first()->status;
        if ($status != 'Transito') {
            $this->status = true;
        } else {
            $this->status = false;
        }
        $this->showmodal();
    }

    public function productos()
    {
        $this->reset([
            'products',
            'Validateproducts'
        ]);
        $products = solicitud::join('solicitud_productos', 'solicitud_productos.idsolicitud', '=', 'solicituds.id')
            ->join('productos', 'solicitud_productos.idproducto', '=', 'productos.id')
            ->select('solicitud_productos.id', 'solicitud_productos.idsolicitud as id_sol', 'solicitud_productos.cantidad', 'solicitud_productos.aprobado', 'productos.producto', 'productos.id as idpro', 'productos.clave_producto as clave')
            ->where('solicitud_productos.idsolicitud', $this->id_solicitud)
            ->get();

        if ($this->openbtn) {
            foreach ($products as $data) {
                $this->products[] = [
                    'clave' => $data->clave,
                    'id' => $data->id,
                    'idsol' => $data->id_sol,
                    'idprod' => $data->idpro,
                    'producto' => $data->producto,
                    'aprobado' => $data->aprobado,
                    'alta' => 0,

                ];
                $this->Validateproducts[] = ['show' => $this->productoexistencia($data->id_sol, $data->idpro, $this->factura)];
            }
        }
    }

    public function productoexistencia($id_solicitud, $id_product, $id_factura)
    {
        $count = productos_factura::where('id_factura', $id_factura)
            ->where('id_producto', $id_product)->where('id_solicitud', $id_solicitud)->count();
        $count2 = productos_factura::where('id_producto', $id_product)->where('id_solicitud', $id_solicitud)->count();

        $value = null;
        if ($count == 0) {
            $value = true;
        }
        if ($count2 == 0) {
            $value = true;
        } else {
            $value = false;
        }
        $this->active = false;
        return $value;
    }

    public function showmodal()
    {
        $this->dispatchBrowserEvent('show-form');
    }

    public function closemodal()
    {
        $this->dispatchBrowserEvent('close-form');
        $this->resetdatos();
        $this->flashdelete();
    }

    public function resetdatos()
    {
        $this->reset([
            'products',
            'Validateproducts',
            'id_solicitud',
            'openbtn',
            'nfactura',
            'idproveedor',
            'descripcion',
            'fecha',
            'factura',
            'active',
            'queryproductos',
        ]);
    }



    public function proveedores()
    {
        $listprove = Proveedor::all();

        $this->proveedor = $listprove;
        return $listprove;
    }

    public function render()
    {

        if ($this->queryproductos && $this->active) {

            $this->productos();
        }
        return view('livewire.almacen.almacenes.requisiciones-almacen', [
            'solicitud' => $this->QuerySolicitud(), 'listProve' => $this->proveedores()
        ]);
    }
}
