<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Model;

class BarangFarmasi extends Model
{
    protected $table = 'barang_farmasi';

    protected $primaryKey = 'idx_barang';

    // public $incrementing = false;

    // public $timestamps = false;

    protected $fillable = [
        "kfa_code",
        "nama_obat_virtual",
        "kd_barang",
        "nama_barang",
        "keterangan",
        "kd_jns_obat",
        "kd_kel_obat",
        "kd_gol_obat",
        "kd_satuan_besar",
        "kd_satuan_kecil",
        "isi_satuan_besar",
        "hpp",
        "harga_satuan_besar",
        "harga_satuan_netto",
        "harga_satuan",
        "stok_min",
        "kd_lokasi",
        "harga_jual",
        "diskon_persen",
        "diskon_rupiah",
        "tanggal",
        "kdpabrik",
        "generik",
        "formularium",
        "dosis",
        "satdosis",
        "ppn1",
        "hrgsatbesarppn",
        "ppn2",
        "senpotbeli",
        "stok001",
        "stok002",
        "stok003",
        "stok004",
        "stok005",
        "stok006",
        "stok007",
        "kode_akun108",
        "stsaktif",
        "restriksi",
        "keterangan_restriki",
        "nama_product_obat_actual",
        "code_dosage_form",
        "name_dosage_form",
    ];
}
