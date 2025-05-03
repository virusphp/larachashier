<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $table = 'ap_satuan';

    protected $primaryKey = 'idsatuan';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'idsatuan',
        'nmsatuan',
    ];
}
