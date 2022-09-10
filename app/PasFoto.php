<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasFoto extends Model
{
    protected $primaryKey = 'id_karyawan';
    public $table = 'table_pasfoto';
    protected $guarded = [];
}
