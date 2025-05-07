<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Model;

class GolonganBarang extends Model
{
    protected $table = 'golongan_obat';

    protected $primaryKey = 'kd_gol_obat';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'kd_gol_obat',
        'gol_obat',
        'stsaktif',
    ];
}
