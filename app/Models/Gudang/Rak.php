<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    protected $table = 'ap_rakbarang';

    protected $primaryKey = 'noid';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'noid',
        'nmrakbarang',
    ];
}
