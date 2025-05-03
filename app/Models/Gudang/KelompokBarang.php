<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Model;

class KelompokBarang extends Model
{
    protected $table = 'kelompok_obat';

    protected $primaryKey = 'kd_kel_obat';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'kd_kel_obat',
        'kel_obat',
        'stsaktif',
        'code_route'
    ];
}
