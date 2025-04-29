<?php

namespace App\Http\Controllers\Gudang\Master;

use App\Http\Controllers\Controller;
use App\Models\Gudang\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    /**
     * Show the categories page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('gudang.master.rak.index');
    }

    public function create()
    {
        return view('gudang.master.rak.create');
    }

    public function edit($rak)
    {
        $dataRak = Rak::select('noid as no', 'nmrakbarang as nama_rak')->where('noid', $rak)->first();
        return view('gudang.master.rak.edit', compact('dataRak'));
    }
}
