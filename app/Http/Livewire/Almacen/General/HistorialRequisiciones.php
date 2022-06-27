<?php

namespace App\Http\Livewire\Almacen\General;

use Livewire\Component;
use App\Models\empleado;
use App\Models\solicitud;
use App\Models\msmestatus;
use Livewire\WithPagination;
use App\Traits\DateFunctions;
use App\Models\status_solicitud;
use Illuminate\Support\Facades\DB;
use App\Traits\DataStatus;

class HistorialRequisiciones extends Component
{
    protected $listeners = ['echo:solicitud,RealtimeEventSolicitud' => 'updateview'];
    use WithPagination;
    use DateFunctions;
    use DataStatus;
    public $solicitud = [], $aux;
    public $seguimiento = [];
    public $close = false;
    public $descripcionaux;

    //Consulto las solicitudes de el empleado usuario que se encuentre activo en la sesion
    public function mount()
    {
        $empleado = empleado::where('id_user', auth()->user()->id)->get();
        $list = solicitud::select('id', 'folio', 'id_empleado', 'active')
            ->where('id_empleado', $empleado[0]->id)
            ->where('active', true)
            ->Orderby('solicituds.id', 'desc')->get();
        //relleno el areglo con los datos
        foreach ($list as $data) {
            $this->solicitud[] = [
                'id' => $data->id,  //id de solicitud
                'folio' => $data->folio,  //folio de la solicitud
                'date' => $this->values($data->id, 'date'),  //metodo a la cual le paso el id de solicitud para que muestre ciertas fechas de status en español
                'time' => $this->values($data->id, 'time'), // Lo mismo que fecha solo que con la hora
                'descripcion' => $this->values($data->id, 'descripcion'), //metodo que le paso el id de solicitud para que me consulte la descripcion e los status
                // aqui al metodo le pasu la colecion de los status   para determinar que icono, color y status se va a mostrar dependiendo de como valla el seguimiento
                'icon' => $this->classobject(status_solicitud::select('status')->where('id_solicitud', $data->id)->latest('id')->first()->status, 'icon'),
                'class' => $this->classobject(status_solicitud::select('status')->where('id_solicitud', $data->id)->latest('id')->first()->status, 'color'),
                'status' => $this->classobject(status_solicitud::select('status')->where('id_solicitud', $data->id)->latest('id')->first()->status, 'status'),
            ];
        }
        $this->aux = status_solicitud::count(); // realizo un contedo de los status
        return $this->solicitud;
    }

    //consulto todos los status para mostrar el seguimiento de la solicitud y se muestre con forme valla avanzndo
    public function seguimiento()
    {
        $this->reset([
            'seguimiento',
        ]);
        foreach ($this->solicitud as $data) {
            $this->seguimiento[] = [
                'status' => $this->status_seguimiento(status_solicitud::select('status')->where('id_solicitud', $data['id'])->get(), 'status'),
                'icon' => $this->status_seguimiento(status_solicitud::select('status')->where('id_solicitud', $data['id'])->get(), 'icon'),
                'close' => $this->solicitud_close(status_solicitud::select('status')->where('id_solicitud', $data['id'])->latest('id')->first()->status),
            ];
        }
    }

    public function solicitud_close($status)
    {
        $close = '';
        if ($status == 'Cerrada') {
            $close = true;
        } else {
            $close = false;
        }
        return $close;
    }

    public function updateview()
    {
        if (status_solicitud::count() != $this->aux) {
            $this->reset([
                'solicitud'
            ]);
            $this->mount();
        }
    }

    public function close_req($id)
    {
        DB::table('solicituds')->where('id', $id)->update(['active' => false]);
        $this->reset(['solicitud']);
        $this->mount();
    }

    public function values($id, $atribute)
    {
        $des = status_solicitud::select($atribute, 'status')->where('id_solicitud', $id)->get();
        $desc = status_solicitud::select($atribute, 'status')->where('id_solicitud', $id)->count();
        $auxiliar = null;
        $value = null;

        if ($desc == 2) {
            foreach ($des as $index => $data) {
                if ($data->status == 'Revisada' || $data->status == 'Cerrada') {
                    $value = $auxiliar;
                } else {
                    if ($atribute == 'descripcion') {
                        $value = status_solicitud::select($atribute, 'status')->where('id_solicitud', $id)->latest('id')->first()->$atribute;
                        $auxiliar = msmestatus::select($atribute)->where('id', $value)->get()[0]->$atribute;
                    } else {
                        $auxiliar = $data->$atribute;
                    }
                }
            }
        } else {
            $value = status_solicitud::select($atribute, 'status')->where('id_solicitud', $id)->latest('id')->first()->$atribute;
            if ($atribute == 'descripcion') {
                $value = msmestatus::select($atribute)->where('id', $value)->get()[0]->$atribute;
            }
        }
        if ($atribute == 'date') {
            $value =  $this->formatdate($value);
        }
        return $value;
    }

    public function render()
    {

        return view('livewire.almacen.general.historial-requisiciones', [$this->seguimiento()]);
    }
}
