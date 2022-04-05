<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $cliente =['nombre', 'imagen', 'cedula', 'correo', 'telefono', 'observaciones'];
}