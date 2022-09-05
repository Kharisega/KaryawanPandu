<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    protected $primaryKey = 'id_karyawan';
    public $table = 'identitas_diri';
    protected $guarded = [];
}
