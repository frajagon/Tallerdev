<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = ['documento_identidad', 'nombre', 'apellido', 'email', 'telefono'];
}
