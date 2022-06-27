<?php

namespace App\Traits;

trait DataStatus
{

    public function status_seguimiento($array, $object)
    {
        $status_array = [];
        foreach ($array as $data) {
            if ($object == 'status') {
                switch ($data->status) {
                    case 'Enviada':
                        $status_array[] = ['status' => 'Enviada'];
                        break;
                    case 'Aprobada':
                        $status_array[] = ['status' => 'Aprobada'];
                        break;
                    case 'Rechazada':
                        $status_array[] = ['status' => 'Rechazada'];
                        break;
                    case 'Cerrada':
                        $status_array[] = ['status' => 'Terminado'];
                        $this->close = true;
                        break;
                    case 'Transito':
                        $status_array[] = ['status' => 'Transito'];
                        break;
                    case 'Almacen':
                        $status_array[] = ['status' => 'Almacen'];
                        break;
                }
            } else {
                switch ($data->status) {
                    case 'Enviada':
                        $status_array[] = ['icon' => 'fas fa-lg fa-paper-plane mx-2'];
                        break;
                    case 'Aprobada':
                        $status_array[] = ['icon' => 'fas fa-clipboard-check fa-lg mx-3'];
                        break;
                    case 'Rechazada':
                        $status_array[] = ['icon' => 'far fa-file-excel fa-lg mx-4'];
                        break;
                    case 'Cerrada':
                        $status_array[] = ['icon' => 'fas fa-times-circle fa-lg mx-3'];
                        break;
                    case 'Transito':
                        $status_array[] = ['icon' => 'fas fa-shipping-fast mx-3'];
                        break;
                    case 'Almacen':
                        $status_array[] = ['icon' => 'fas fa-archive mx-3'];
                        break;
                }
            }
        }
        return $status_array;
    }

    public function classobject($count, $type)
    {
        $object = '';
        if ($type == 'color') {
            switch ($count) {
                case 'Enviada':
                    $object = 'bg-gray-500';
                    break;
                case 'Revisada':
                    $object = 'bg-gray-500';
                    break;
                case 'Aprobada':
                    $object = 'bg-green-700';
                    break;
                case 'Rechazada':
                    $object = 'bg-red-700';
                    break;
                case 'Cerrada':
                    $object = 'bg-secondary';
                    break;
                case 'Transito':
                    $object = 'bg-primary';
                    break;
                case 'Almacen':
                    $object = 'bg-black';
                    break;
            }
        } else if ($type == 'icon') {
            switch ($count) {
                case 'Enviada':
                    $object = 'fas fa-lg fa-paper-plane';
                    break;
                case 'Revisada':
                    $object = 'fas fa-lg fa-paper-plane';
                    break;
                case 'Aprobada':
                    $object = 'fas fa-lg fa-clipboard-check fa-lg';
                    break;
                case 'Rechazada':
                    $object = 'fas fa-file-excel fa-lg';
                    break;
                case 'Cerrada':
                    $object = 'fas fa-times-circle fa-lg';
                    break;
                case 'Transito':
                    $object = 'fas fa-shipping-fast';
                    break;
                case 'Almacen':
                    $object = 'fas fa-archive';
                    break;
            }
        } else {
            switch ($count) {
                case 'Enviada':
                    $object = 'enviada';
                    break;
                case 'Revisada':
                    $object = 'enviada';
                    break;
                case 'Aprobada':
                    $object = 'aprobada';
                    break;
                case 'Rechazada':
                    $object = 'rechazada';
                    break;
                case 'Cerrada':
                    $object = 'cerrada';
                    break;
                case 'Transito':
                    $object = 'transito';
                    break;
                case 'Almacen':
                    $object = 'almacen';
                    break;
            }
        }
        return $object;
    }
}
