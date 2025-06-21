<div>
    @section('sub_title', 'Form Barang Farmasi')
    @section('sub_menu', 'Master')
    @section('menu_active', 'form-barang')


    <div class="row">
        <div class="col-xxl-6 col-sm-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    {{-- {{ dd($dataRak, $noid, $nama_rak) }} --}}
                    <h4 class="card-title mb-0 flex-grow-1">Form {{ !empty($kode_barang) ? "Edit" : "Tambah" }} Barang
                        Farmasi</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form wire:submit="{{ !empty($kode_barang) ? 'update("'.trim($kode_barang).'")' : 'store()' }}">

                            <x-input-group wire:model="nama_barang" name="nama_barang" type="text" label="Nama Barang"
                                classButton="btn-outline-secondary" namaButton="Cek KFA" placeholder="Nama barang" />

                            <div class="row mb-2">
                                <div class="col-lg-3">
                                    <label for="nama_detail" class="form-label">Nama Dagang (POV)</label>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input name="code_kfa" type="text" class="form-control"
                                                placeholder="Kode kfa" wire:model="code_kfa">
                                        </div>
                                        <div class="col-lg-9 ps-0">
                                            <input name="nama_obat_virtual" type="text" class="form-control"
                                                placeholder="Nama Obat Virtual" wire:model="nama_obat_virtual">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <x-select-choices id="select-choices" name="kelompok_obat" label="Kelompok Obat (Aset)"
                                placeholder="Pilih Salah satu"
                                :options="['makanan' => 'tahu', 'minuman' => 'orange']" />

                            <x-select-choices id="select-choices" name="kelompok_kategori" label="Kelompok / Kategori"
                                placeholder="Pilih Salah satu" :options="[]" />

                            <x-select-choices id="select-choices" name="jenis_barang" label="Jenis Barang"
                                placeholder="Pilih Salah satu" :options="[]" />

                            <x-select-choices id="select-choices" name="golongan_obat" label="Golongan Obat"
                                placeholder="Pilih Salah satu" :options="[]" />

                            <x-select-choices id="select-choices" name="pabrik" label="Pabrik"
                                placeholder="Pilih Salah satu" :options="[]" />

                            <x-select-choices id="select-choices" name="pabrik" label="Pabrik"
                                placeholder="Pilih Salah satu" :options="[]" />

                            <x-select-choices id="select-choices" name="generik" label="Generik (G/N)"
                                placeholder="Pilih Salah satu" :options="[]" />

                            <x-select-choices id="select-choices" name="formularium" label="Formularium / Non"
                                placeholder="Pilih Salah satu" :options="[]" />

                            <div class="row mb-1">
                                <div class="col-lg-3">
                                    <label for="restriksi" class="form-label">Restriksi</label>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-4 ">
                                            <x-select id="select-choices" name="restriksi" label="Restriksi"
                                                placeholder="Pilih" :options="[]" />
                                        </div>
                                        <div class="col-lg-8 ps-0">
                                            <input name="keterangan_restriksi" type="text" class="form-control"
                                                placeholder="Keterangan Restriksi" wire:model="keterangan_restriksi">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <x-input name="nama_product_obat_actual" type="text" label="Product Obat Actual"
                                placeholder="Product Obat Actual" />

                            <div class="row">
                                <div class="col-md-6">
                                    <hr>
                                    <h6>Kemasan Sastuan Besar (Beli - Suplier)</h6>
                                    <hr>
                                    <x-select-choices id="select-choices" name="satuan_besar" label="Satuan"
                                        placeholder="Pilih Salah satu" :options="[]" />

                                </div>
                                <div class="col-md-6">
                                    <hr>
                                    <h6>Kemasan Satuan Kecil (Jual - Apotek)</h6>
                                    <hr>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <label for="isi" class="form-label">Isi</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <input name="isi" type="text" class="form-control"
                                                        placeholder="Isi">
                                                </div>
                                                <div class="col-lg-8 ps-0">
                                                    <input name="keterangan_restriksi" type="text" class="form-control"
                                                        placeholder="Keterangan Restriksi"
                                                        wire:model="keterangan_restriksi">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="text-end">
                                <button wire:navigate href="{{ route('gudang.barang.index')  }}" type="button"
                                    class="btn btn-info">Kembali</button>
                                <button class="btn btn-{{ !empty($nama_bagian) ? 'warning' : 'primary' }}">{{
                                    !empty($nama_bagian)
                                    ?"Update" : "Simpan" }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>

    </div>
</div>
@script
<script type="text/javascript">
    const elementChoices = document.getElementById('select-choices');
    const choices = new Choices(elementChoices);
</script>
@endscript