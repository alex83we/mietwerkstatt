<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Firma extends Model
{
    public $table = 'backend_firmendaten';


    public function firma()
    {
        $firma = DB::table('backend_firmendaten')->get();

        return $firma;
    }
}
