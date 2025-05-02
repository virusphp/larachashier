<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'ap_bagian';

    protected $primaryKey = 'kdbagian';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'kdbagian',
        'nmbagian',
        'kd_sub_unit',
        'status_apotik'
    ];
}
