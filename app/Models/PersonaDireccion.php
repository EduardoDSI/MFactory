<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaDireccion extends Model
{
    use HasFactory;
    protected $table = 'personadireccion'; 
    protected $primaryKey = 'ID_Direccion';
}
