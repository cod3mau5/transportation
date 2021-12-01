<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class _TipoServicio extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $table   = 'tipo_servicios';

    public function listTipos()
    {
        return [
                'ow'=>'One Way',
                'rt'=>'Round Trip',
                'os'=>'Open Service',
                'ws'=>'One Way Salida',
                'wh'=>'One Way Hotel'
            ];
    }
}
