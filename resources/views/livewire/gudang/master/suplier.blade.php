<div>
    @section('sub_title', 'Data suplier')
    @section('sub_menu', 'Master')
    @section('menu_active', 'suplier')


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
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Suplier</h4>
                    <div class="flex-shrink-0 row g-2">
                        <div class="col">
                            <input class="form-control form-control-sm float-end" type="text" placeholder="Searchs..."
                                wire:model.live="search">
                        </div>
                        <div class="col">
                            <button wire:click="createMode()" class="btn btn-sm btn-success float-end"><i
                                    class="bx bx-plus"></i>
                                Tambah</button>
                        </div>
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
                                                <th scope="col">No</th>
                                                <th scope="col">Kode</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">No Telp</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{--
                                            <pre>{{ dd($supliers) }}</pre> --}}
                                            @if($supliers && $supliers->count())
                                            @foreach($supliers as $suplier)
                                            <tr>
                                                <td wire:key="item-{{ $suplier->kode_suplier }}">{{ $loop->iteration }}
                                                </td>
                                                <td>{{ trim($suplier->kode_suplier) }}</td>
                                                <td>{{ $suplier->nama_suplier }}</td>
                                                <td>{{ $suplier->alamat }}</td>
                                                <td>{{ $suplier->telpon }}</td>
                                                <td>{{ $suplier->type_suplier }}</td>
                                                <td>
                                                    <button type="button"
                                                        wire:click="edit('{{ trim($suplier->kode_suplier) }}')"
                                                        class="btn btn-sm btn-warning"><i
                                                            class="bx bx-edit"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        wire:click.prevent="deleteConfirmation('{{ trim($suplier->kode_suplier) }}')"
                                                        disabled><i class="bx bx-trash"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                    {{ $supliers->links() }}
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
        <div class="col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    {{-- {{ dd($datasuplier, $noid, $nama_suplier) }} --}}
                    <h4 class="card-title mb-0 flex-grow-1">Form {{ !empty($kode_suplier) ? "Edit" : "Tambah" }} suplier
                    </h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form wire:submit="{{ !empty($kode_suplier) ? 'update('.$kode_suplier.')' : 'store()' }}">
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="type_suplier" class="form-label">Type Suplier</label>
                                </div>
                                <div class="col-lg-9">
                                    <section class="form-label">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="obat"
                                                name="type_suplier[]" value="obat" wire:model="type_suplier">
                                            <label class="form-check-label" for="obat">Obat</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="bhp"
                                                name="type_suplier[]" value="bhp" wire:model="type_suplier">
                                            <label class="form-check-label" for="bhp">Bahan Habis Pakai</label>
                                        </div>
                                    </section>
                                    @error('type_suplier')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="nama_suplier" class="form-label">Nama Suplier (Alias/
                                        Singakatan)</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('nama_suplier') is-invalid @enderror"
                                        id="nama_suplier" name="nama_suplier"
                                        placeholder="Nama suplier (alias/singkatan)" wire:model="nama_suplier"
                                        autofocus>
                                    @error('nama_suplier')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="nama_detail" class="form-label">Nama Suplier (Detail)</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('nama_detail') is-invalid @enderror"
                                        id="nama_detail" name="nama_detail" placeholder="Nama Detail"
                                        wire:model="nama_detail">
                                    <i class="text-danger">Nama Suplier wajib di isi lengkap dengan titile di belakang
                                        (Jaya Maju. PT,
                                        KRATON. RSUD, KIMIA FARMA. APOTEK)</i>
                                    @error('nama_detail')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                </div>
                                <div class="col-lg-9">
                                    <textarea type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        id="alamat" name="alamat" placeholder="Alamat" wire:model="alamat"></textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="telepon" class="form-label">No Telepon</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                                        id="telepon" name="telepon" placeholder="telepon" wire:model="telepon">
                                    @error('telepon')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end">
                                <button wire:click="tableMode()" type="button" class="btn btn-info">Kembali</button>
                                <button class="btn btn-{{ !empty($kode_suplier) ? 'warning' : 'primary' }}">{{
                                    !empty($kode_suplier)
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
                   window.Livewire.dispatch('deleteConfirmed');
                }
            })
        });

        window.addEventListener('suplierDeleted', event => {
            Swal.fire(
                'Terhapus!',
                'Data telah dihapus.',
                'success'
            )
        });
</script>
@endpush