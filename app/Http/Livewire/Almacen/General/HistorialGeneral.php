<?php

namespace App\Http\Livewire\Almacen\General;

use Livewire\Component;
use App\Models\empleado;
use App\Models\solicitud;
use App\Models\status_solicitud;
use App\Traits\DateFunctions;

class HistorialGeneral extends Component
{
    use DateFunctions;
    public $solicitud = [];

    public function querysoliitudes()
    {
        $empleado = empleado::where('id_user', auth()->user()->id)->get();
        $list = solicitud::select('id', 'folio', 'id_empleado', 'active')
            ->where('id_empleado', $empleado[0]->id)
            ->where('active', false)
            ->Orderby('solicituds.id', 'desc')->get();
        //relleno el areglo con los datos
        foreach ($list as $data) {
            $this->solicitud[] = [
                'id' => $data->id,  //id de solicitud
                'folio' => $data->folio,  //folio de la solicitud
                'dateA' => $this->values($data->id, 'dateA'),  //metodo a la cual le paso el id de solicitud para que muestre ciertas fechas de status en español
                'dateC' => $this->values($data->id, 'dateC'),  //metodo a la cual le paso el id de solicitud para que muestre ciertas fechas de status en español
                'status' => $this->getstatus(status_solicitud::select('status')->where('id_solicitud', $data->id)->get()),
            ];
        }
        return $list;
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

    public function render()
    {
        return view('livewire.almacen.general.historial-general', ['solicitudes' => $this->querysoliitudes()]);
    }
}
