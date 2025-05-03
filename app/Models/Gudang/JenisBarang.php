<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    protected $table = 'jenis_obat';

    protected $primaryKey = 'kd_jns_obat';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'kd_jns_obat',
        'jns_obat',
        'rek_p',
        'rek_b',
        'kode',
        'stsaktif',
        'kd_perkiraan_persediaan',
        'kd_beban_pengadaan_obat',
        'nama_beban_pengadaan_obat',
        'nama_perkiraan_persediaan'
    ];
}
