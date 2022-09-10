<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoKTP extends Model
{
    protected $primaryKey = 'id_karyawan';
    public $table = 'table_fotoktp';
    protected $guarded = [];
}
