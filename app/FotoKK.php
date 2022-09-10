<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoKK extends Model
{
    protected $primaryKey = 'id_karyawan';
    public $table = 'table_fotokk';
    protected $guarded = [];
}
