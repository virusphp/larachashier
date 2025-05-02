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
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Unit bagian</h4>
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
                                            <pre>{{ dd($raks) }}</pre> --}}
                                            @if($units && $units->count())
                                            @foreach($units as $item)
                                            <tr>
                                                <td wire:key="item-{{ $item->no }}">{{ $loop->iteration }}</td>
                                                <td>{{ trim($item->kode_bagian) }}</td>
                                                <td>{{ $item->nama_bagian }}</td>
                                                <td>
                                                    <button type="button"
                                                        wire:click="edit('{{ trim($item->kode_bagian) }}')"
                                                        class="btn btn-sm btn-warning"><i
                                                            class="bx bx-edit"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        wire:click.prevent="deleteConfirmation('{{ $item->kode_bagian }}')"><i
                                                            class="bx bx-trash"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                    {{ $units->links() }}
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
                    <h4 class="card-title mb-0 flex-grow-1">Form {{ !empty($kode_bagian) ? "Edit" : "Tambah" }} Unit
                        Bagian</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form wire:submit="{{ !empty($kode_bagian) ? 'update("'.trim($kode_bagian).'")' : 'store()' }}">
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="nama_bagian" class="form-label">Nama Rak</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('nama_bagian') is-invalid @enderror"
                                        id="nama_bagian" name="nama_rak" placeholder="Nama bagian"
                                        wire:model="nama_bagian" autofocus>
                                    @error('nama_bagian')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="text-end">
                                <button wire:click="tableMode()" type="button" class="btn btn-info">Kembali</button>
                                <button class="btn btn-{{ !empty($kode_bagian) ? 'warning' : 'primary' }}">{{
                                    !empty($kode_bagian)
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

        window.addEventListener('unitDeleted', event => {
            Swal.fire(
                'Terhapus!',
                'Data telah dihapus.',
                'success'
            )
        });
</script>
@endpush