<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Model;

class Pabrik extends Model
{
    protected $table = 'ap_pabrik';

    protected $primaryKey = 'kdpabrik';

    public $incrementing = false;

    public $timestamps = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kdpabrik',
        'nmpabrik',
    ];
}
