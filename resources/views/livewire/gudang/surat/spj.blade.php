<div>
    @section('sub_title', 'Data SPJ')
    @section('sub_menu', 'Surat')
    @section('menu_active', 'SPJ')

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
                    <h4 class="card-title mb-0 flex-grow-1">SPJ</h4>
                    <div class="flex-shrink-0 row g-1 align-items-center">
                        <div class="col-auto p-0 me-1">
                            <input class="form-control form-control-sm" type="text" placeholder="Cari SPJ"
                                wire:model.live="search" style="margin:0;" />
                        </div>
                        <div class="col-auto p-0">
                            <button wire:navigate href="/gudang/surat/spj/create" class="btn btn-sm btn-success"
                                style="margin:0 0 0 2px;">
                                <i class="bx bx-plus"></i> Tambah
                            </button>
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
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">No SPJ</th>
                                                <th scope="col">Nama SPJ</th>
                                                <th scope="col">Suplier</th>
                                                <th scope="col">Jumlah Faktur</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{--
                                            <pre>{{ dd($raks) }}</pre> --}}
                                            {{-- @if($raks && $raks->count())
                                            @foreach($raks as $rak)
                                            <tr>
                                                <td wire:key="item-{{ $rak->no }}">{{ $loop->iteration }}</td>
                                                <td>{{ $rak->nama_rak }}</td>
                                                <td>
                                                    <button type="button" wire:click="edit({{ $rak->no }})"
                                                        class="btn btn-sm btn-warning"><i
                                                            class="bx bx-edit"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        wire:click.prevent="deleteConfirmation({{ $rak->no }})"><i
                                                            class="bx bx-trash"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif --}}
                                        </tbody>
                                    </table>

                                    {{-- {{ $raks->links() }} --}}
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

        window.addEventListener('rakDeleted', event => {
            Swal.fire(
                'Terhapus!',
                'Data telah dihapus.',
                'success'
            )
        });
</script>
@endpush