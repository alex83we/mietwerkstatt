<?php

namespace App\Models\PDF;

use Illuminate\Database\Eloquent\Model;

class Kaufvertrag extends Model
{
    public $table = 'kaufvertrag';

    protected $fillable = ['fahrzeug_id', 'path'];
}
