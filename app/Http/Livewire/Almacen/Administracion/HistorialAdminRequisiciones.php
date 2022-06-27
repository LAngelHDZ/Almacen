<?php

namespace App\Http\Livewire\Almacen\Administracion;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\solicitud;
use App\Models\status_solicitud;
use App\Traits\DataStatus;

class HistorialAdminRequisiciones extends Component
{
    public $products = [];
    public $openbtn = true;
    public $solicitudes = [];
    public $id_solicitud, $aux;
    public $status, $filter_status = 'Revisada';
    public $seguimiento = [];
    public $solicitud = [];
    use DataStatus;

    public function querysoliitudes()
    {
        $filter = $this->filter_status;
        $status = true;
        $list = solicitud::join('empleados', 'empleados.id', '=', 'solicituds.id_empleado')
            ->join('users', 'users.id', '=', 'empleados.id_user')
            ->join('status_solicituds as status', '.id_solicitud', '=', 'solicituds.id')
            ->select('solicituds.active', 'solicituds.id', 'solicituds.folio', 'solicituds.descripcion', 'empleados.id_user', 'users.name')
            ->where(function ($query) use ($filter, $status) {
                $query->where('status.status', $filter)
                    ->where('solicituds.state', $status);
            })
            ->Orderby('status.date', 'desc')->Orderby('status.time', 'desc')
            ->paginate(5);
        //relleno el areglo con los datos
        foreach ($list as $data) {
            $this->solicitud[] = [
                'id' => $data->id,  //id de solicitud
                'folio' => $data->folio,  //folio de la solicitud
                'dateA' => $this->values($data->id, 'dateA'),  //metodo a la cual le paso el id de solicitud para que muestre ciertas fechas de status en español
                'dateC' => $this->values($data->id, 'dateC'),  //metodo a la cual le paso el id de solicitud para que muestre ciertas fechas de status en español
            ];
        }
        return $this->solicitud;
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
    public function render()
    {
        return view('livewire.almacen.administracion.historial-admin-requisiciones');
    }
}
