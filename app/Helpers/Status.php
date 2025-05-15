<?php


function tanggalNilai($nilai)
{
    return date("N", strtotime($nilai)) + 1;
}

function tanggalIndo($nilai)
{
    return date('d-m-Y', strtotime($nilai));
}

function jamLokal($nilai)
{
    return date('H:i', strtotime($nilai));
}

function tanggalFilter($nilai)
{
    return date('Y-m-d', strtotime($nilai));
}


function tanggalPdf($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', date('Y-m-d', strtotime($tanggal)));
    $bln = isset($pecahkan[1]) ? (int) $pecahkan[1] : ' ';
    return $pecahkan[2] . '_' . $bulan[$bln] . '_' . $pecahkan[0];
}


function hitungUmur($tanggal_lahir)
{
    $birthDate = new DateTime($tanggal_lahir);
    $today = new DateTime("today");
    if ($birthDate > $today) {
        exit("0 tahun 0 bulan 0 hari");
    }
    $y = $today->diff($birthDate)->y;
    $m = $today->diff($birthDate)->m;
    $d = $today->diff($birthDate)->d;
    // return $y." tahun ".$m." bulan ".$d." hari";
    return $y . " tahun";
}

function rupiah($nilai)
{
    return number_format($nilai, 0, ",", ".");
}

function rupiahWithComa($nilai)
{
    return number_format($nilai, 2, ',', '.');
}

function numberOnly($nilai)
{
    return preg_replace("/[^0-9,]/", "", $nilai);
}

function selisihHari($tanggalMasuk, $tanggalPulang)
{
    $tglAwal = strtotime($tanggalMasuk);
    $tglAkhir = strtotime($tanggalPulang);

    $jarak = $tglAkhir - $tglAwal;

    $hari = $jarak / 60 / 60 / 24;

    return $hari + 1;
}

function umurTahun($tanggalLahir)
{
    $birthDate = new DateTime($tanggalLahir);
    $today = new DateTime("today");
    if ($birthDate > $today) {
        exit("0 tahun 0 bulan 0 hari");
    }
    $y = $today->diff($birthDate)->y;
    $m = $today->diff($birthDate)->m;
    $d = $today->diff($birthDate)->d;
    return $y . " tahun ";
}

function jenisKelamin($nilai)
{
    return $nilai == 1 ? "Laki laki" : "Perempuan";
}

function existing($key, $dataArray)
{
    return array_key_exists($key, $dataArray) ? $dataArray[$key] : "";
}

function getKelas($nilai)
{
    $kelas = [
        1 => 'KL1',
        2 => 'KL2',
        3 => 'KL3',
        4 => 'VIP',
        6 => 'NON',
        10 => 'ICU',
        11 => 'NON',
        13 => 'SAL',
        14 => 'NIC',
        15 => 'PIC',
        16 => 'ISO',
        17 => 'HCU',
        18 => 'NON',
        19 => 'HCU',
        20 => 'ICU',
        21 => 'NON'
    ];

    return $kelas[$nilai];
}
