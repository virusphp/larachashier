<div>
    @section('sub_title', 'Data Unit Bagian')
    @section('sub_menu', 'Master')
    @section('menu_active', 'unit-bagian')


    @if($isTableMode === true)
    {{-- TABLE --}}
    <div class="row" style="{{ $isTableMode === true ? '' : 'display:none' }}">
        @if (session()->has('message'))
        <div class="col-lg-12">
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show" x-transition
                class="alert alert-success">
                {{ session('message') }}
            </div>
        </div>
        @endif

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Barang Farmasi</h4>
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center">
                            <label for="filterJenisObat" class="form-label me-2 mb-0 text-nowrap">Filter Jenis
                                Barang</label>
                            <select wire:model.live="filterJenisObat" class="form-select form-select-sm w-auto">
                                <option value="">Semua</option>
                                @foreach ($jenisObat as $item)
                                <option value="{{ $item->kode_jns_obat }}" {{ $filterJenisObat==$item->kode_jns_obat
                                    ? 'selected' : '' }}>
                                    {{ $item->jenis_obat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="filterStatusBarang" class="form-label me-2 mb-0 text-nowrap">Status
                            </label>
                            <select wire:model.live="filterStatusBarang" class="form-select form-select-sm w-auto">
                                <option value="1">AKtif</option>
                                <option value="2">Non Aktif</option>
                            </select>
                        </div>
                        <input class="form-control form-control-sm" type="text" placeholder="Search..."
                            wire:model.live="search">
                        <button wire:navigate href="{{ route('gudang.barang.form') }}"
                            class="btn btn-sm btn-success d-flex align-items-center gap-1">
                            <i class="bx bx-plus"></i><span>Tambah</span>
                        </button>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Kode / Kfa</th>
                                                <th scope="col">Nama Barang</th>
                                                <th scope="col">Sat Besar</th>
                                                <th scope="col">Hna Besar</th>
                                                <th scope="col">Harga PPN(B)</th>
                                                <th scope="col">Isi</th>
                                                <th scope="col">Sat Kecil</th>
                                                <th scope="col">Hna Kecil</th>
                                                <th scope="col">Harga PPN(K)</th>
                                                <th scope="col">Pot</th>
                                                <th scope="col">Harga Jual</th>
                                                <th scope="col">Formas</th>
                                                <th scope="col">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($barangFarmasis && $barangFarmasis->count())
                                            @foreach($barangFarmasis as $item)
                                            <tr>
                                                <td wire:key="item-{{ $item->kode_barang }}"
                                                    title="{{ $item->kfa_code  }}">
                                                    {!! $item->kfa_code == null ? "<button
                                                        class='btn btn-link text-info p-0 m-0'>$item->kode_barang</button>"
                                                    :
                                                    $item->kode_barang !!}</td>
                                                <td>{{ $item->nama_barang }}</td>
                                                <td>{{ $item->satuan_besar }}</td>
                                                <td>{{ rupiah($item->harga_satuan_besar) }}</td>
                                                <td>{{ rupiah($item->harga_besar_ppn) }}</td>
                                                <td>{{ $item->isi }}</td>
                                                <td>{{ $item->satuan_kecil }}</td>
                                                <td>{{ rupiah($item->harga_satuan_kecil) }}</td>
                                                <td>{{ rupiah($item->harga_kecil_ppn) }}</td>
                                                <td>{{ rupiah($item->potongan) }}</td>
                                                <td>{{ rupiah($item->harga_jual) }}</td>
                                                <td>{{ $item->formularium }}</td>
                                                <td>{{ $item->keterangan }}</td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                    {{ $barangFarmasis->links() }}
                                </div>
                            </div>
                            <!--end col-->

                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    @else
    {{-- FORM CREATE --}}
    <div class="row" style="{{ $isTableMode === true ? 'display:none' : '' }}">
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

                            <x-input wire:model="nama_barang" name="nama_barang" type="text" label="Nama Barang"
                                placeholder="Nama barang" />

                            <x-input wire:model="nama_detail" name="nama_detail" type="text" label="Nama Detail"
                                placeholder="Nama Detail" />

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="status_apotik" class="form-label">Status Apotik</label>
                                </div>
                                <div class="col-lg-3">
                                    <select class="form-select @error('status_aktif') is-invalid @enderror"
                                        wire:model="status_aktif" id="status_aktif" name="status_aktif">
                                        <option value="1">Aktif</option>
                                        <option value="2">Non Aktif</option>
                                    </select>
                                    @error('status_aktif')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end">
                                <button wire:click="tableMode()" type="button" class="btn btn-info">Kembali</button>
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
    @endif
</div>

@push('scripts')
<script>
    window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // console.log(result.isConfirmed);
                   window.Livewire.dispatch('deleteConfirmed');
                }
            })
        });

        window.addEventListener('barangFarmasiDeleted', event => {
            Swal.fire(
                'Terhapus!',
                'Data telah dihapus.',
                'success'
            )
        });
</script>
@endpush