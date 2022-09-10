<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoSetBadan extends Model
{
    protected $primaryKey = 'id_karyawan';
    public $table = 'table_foto_set_badan';
    protected $guarded = [];
}
