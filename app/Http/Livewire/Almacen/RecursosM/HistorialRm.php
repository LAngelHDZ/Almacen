<?php

namespace App\Http\Livewire\Almacen\RecursosM;

use App\Events\RealtimeEventSolicitud;
use App\Models\solicitud;
use App\Models\status_solicitud;
use App\Traits\DateFunctions;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class HistorialRm extends Component
{
    use WithPagination;
    use DateFunctions;
    public $products = [];
    public $openbtn = true;
    public $solicitudes = [];
    public $id_solicitud, $aux;
    public $status, $filter_status = 'Revisada';
    public $seguimiento = [];

    // protected $listeners = ['echo:solicitud,RealtimeEventSolicitud' => 'updateview'];


    public function QuerySolicitud()
    {
        $list = solicitud::join('empleados', 'empleados.id', '=', 'solicituds.id_empleado')
            ->join('users', 'users.id', '=', 'empleados.id_user')
            // ->join('status_solicituds as status','.id_solicitud','=','solicituds.id')
            ->select('solicituds.active', 'solicituds.id', 'solicituds.folio', 'solicituds.descripcion', 'empleados.id_user', 'users.name')
            ->where('solicituds.state', false)
            // ->Orderby('status.date','desc')->Orderby('status.time','desc')
            ->paginate(10);

        foreach ($list as $data) {
            $this->solicitudes[] = [
                'id' => $data->id,  //id de solicitud
                'folio' => $data->folio,  //folio de la solicitud
                'dateA' => $this->values($data->id, 'dateA'),  //metodo a la cual le paso el id de solicitud para que muestre ciertas fechas de status en español
                'dateC' => $this->values($data->id, 'dateC'),  //metodo a la cual le paso el id de solicitud para que muestre ciertas fechas de status en español
                'status' => $this->getstatus(status_solicitud::select('status')->where('id_solicitud', $data->id)->get()),
            ];
        }
        return $list;
        $this->aux = solicitud::count();
    }

    public function getstatus($status)
    {

        foreach ($status as $index => $data) {
            if ($data->status == 'Aprobada' || $data->status == 'Rechazada') {
                $status = $data->status;
                break;
            }
        }
        return $status;
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
            $this->mount();
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

    public function aceptar($state)
    {
        $descrip = '';
        $status = '';
        if ($state == 1) {
            $status = 'Rechazada';
            $descrip = 'Solicitud rechazada favor de comunicarse con RRMM';
        } else {
            $status = 'Aprobada';
            $descrip = 'Solicitud aprobada en proceso de realizar compra';
        }
        $this->product_aprobado();
        status_solicitud::create([
            'id_solicitud' => $this->id_solicitud,
            'status' => $status,
            'descripcion' => $descrip,
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
        $status = '';
        $products = solicitud::join('solicitud_productos', 'solicitud_productos.idsolicitud', '=', 'solicituds.id')
            ->join('productos', 'solicitud_productos.idproducto', '=', 'productos.id')
            ->select('solicitud_productos.id', 'solicitud_productos.idsolicitud as id_sol', 'solicitud_productos.cantidad', 'solicitud_productos.aprobado', 'productos.producto', 'productos.id as idpro', 'productos.clave_producto as clave')
            ->where('solicitud_productos.idsolicitud', $id)
            ->get();

        if ($this->openbtn) {
            foreach ($products as $data) {
                $this->products[] = [
                    'clave' => $data->clave,
                    'id' => $data->id,
                    'idsol' => $data->id_sol,
                    'idprod' => $data->idpro,
                    'producto' => $data->producto,
                    'cantidad' => $data->cantidad,
                    'aprobado' => $data->aprobado
                ];
            }
        }
        $this->openbtn = false;
        $status = status_solicitud::select('status')->where('id_solicitud', $id)->latest('id')->first()->status;
        if ($status != 'Revisada') {
            $this->status = true;
        } else {
            $this->status = false;
        }
        $this->showmodal();
    }

    public function showmodal()
    {
        $this->dispatchBrowserEvent('show-form');
    }

    public function closemodal()
    {
        $this->dispatchBrowserEvent('close-form');
        $this->resetdatos();
    }

    public function resetdatos()
    {
        $this->reset([
            'products',
            'id_solicitud',
            'openbtn',
        ]);
    }
    public function render()
    {
        return view('livewire.almacen.recursos-m.historial-rm', ['solicitud' => $this->QuerySolicitud()]);
    }
}
