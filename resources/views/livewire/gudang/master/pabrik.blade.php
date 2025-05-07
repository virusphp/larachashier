<div>
    @section('sub_title', 'Data pabrik')
    @section('sub_menu', 'Master')
    @section('menu_active', 'pabrik')


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
                    <h4 class="card-title mb-0 flex-grow-1">Pabrik</h4>
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
                            <div class="col-xl-6">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Kode</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{--
                                            <pre>{{ dd($pabriks) }}</pre> --}}
                                            @if($pabriks && $pabriks->count())
                                            @foreach($pabriks as $pabrik)
                                            <tr>
                                                <td wire:key="item-{{ $pabrik->kode_pabrik }}">{{ $loop->iteration }}
                                                </td>
                                                <td>{{ $pabrik->kode_pabrik }}</td>
                                                <td>{{ $pabrik->nama_pabrik }}</td>
                                                <td>
                                                    <button type="button"
                                                        wire:click="edit('{{ trim($pabrik->kode_pabrik) }}')"
                                                        class="btn btn-sm btn-warning"><i
                                                            class="bx bx-edit"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        wire:click.prevent="deleteConfirmation('{{ trim($pabrik->kode_pabrik) }}')"><i
                                                            class="bx bx-trash"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                    {{ $pabriks->links() }}
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
                    {{-- {{ dd($datapabrik, $noid, $nama_pabrik) }} --}}
                    <h4 class="card-title mb-0 flex-grow-1">Form {{ !empty($kode_pabrik) ? "Edit" : "Tambah" }} pabrik
                    </h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form wire:submit="{{ !empty($kode_pabrik) ? 'update('.$kode_pabrik.')' : 'store()' }}">
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="nama_pabrik" class="form-label">Nama pabrik</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('nama_pabrik') is-invalid @enderror"
                                        id="nama_pabrik" name="nama_pabrik" placeholder="Nama pabrik"
                                        wire:model="nama_pabrik" autofocus>
                                    @error('nama_pabrik')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="text-end">
                                <button wire:click="tableMode()" type="button" class="btn btn-info">Kembali</button>
                                <button class="btn btn-{{ !empty($kode_pabrik) ? 'warning' : 'primary' }}">{{
                                    !empty($kode_pabrik)
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

        window.addEventListener('pabrikDeleted', event => {
            Swal.fire(
                'Terhapus!',
                'Data telah dihapus.',
                'success'
            )
        });
</script>
@endpush