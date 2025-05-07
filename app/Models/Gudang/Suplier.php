<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $table = 'ap_suplier';

    protected $primaryKey = 'kdsuplier';

    public $incrementing = false;

    protected $fillable = [
        'kdsuplier',
        'nmsuplier',
        'alamat',
        'telpon',
        'nama_detail',
        'type_suplier',
        'created_at',
        'updated_at',
    ];
}
