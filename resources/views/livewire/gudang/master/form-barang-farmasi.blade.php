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
                                        <div class="col-lg-9">
                                            <input name="nama_obat_virtual" type="text" class="form-control"
                                                placeholder="Nama Obat Virtual" wire:model="nama_obat_virtual">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <x-select-choices name="kelompok_obat" label="Kelompok Obat (Aset)"
                                placeholder="Pilih Salah satu" :options="[]" />

                            <x-select-choices name="kelompok_kategori" label="Kelompok / Kategori"
                                placeholder="Pilih Salah satu" :options="[]" />

                            <x-select-choices name="jenis_barang" label="Jenis Barang" placeholder="Pilih Salah satu"
                                :options="[]" />

                            <x-select-choices name="golongan_obat" label="Golongan Obat" placeholder="Pilih Salah satu"
                                :options="[]" />

                            <x-select-choices name="pabrik" label="Pabrik" placeholder="Pilih Salah satu"
                                :options="[]" />

                            <x-select-choices name="pabrik" label="Pabrik" placeholder="Pilih Salah satu"
                                :options="[]" />

                            <x-select-choices name="generik" label="Generik (G/N)" placeholder="Pilih Salah satu"
                                :options="[]" />

                            <x-select-choices name="formularium" label="Formularium / Non"
                                placeholder="Pilih Salah satu" :options="[]" />


                            <div class="row mb-2">
                                <div class="col-lg-3">
                                    <label for="restrik" class="form-label">Restrik</label>
                                </div>
                                <div class="col-lg-9">
                                    <select class="form-select form-select-sm" data-choices name="restrik" id="restrik">
                                        <option value="">This is a placeholder</option>
                                        <option value="Choice 1">Choice 1</option>
                                        <option value="Choice 2">Choice 2</option>
                                        <option value="Choice 3">Choice 3</option>
                                    </select>
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
    const elementChoices = document.getElementById('choices-single-default');
    const choices = new Choices(elementChoices);
</script>
@endscript