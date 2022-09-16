<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeluargaLingkungan extends Model
{
    protected $primaryKey = 'id_karyawan';
    public $table = 'table_keluarga_lingkungan';
    protected $guarded = [];
}
