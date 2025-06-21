<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Model;

class ApSpjHeader extends Model
{
    //
    protected $table = 'ap_spj_header';

    protected $fillable = [
        'no_spj',
        'nama_spj', // bisa di pakai untuk keterangan
        'kode_suplier',
        'tanggal_spj',
        'status',
        'created_by',
        'updated_by',
    ];
}
