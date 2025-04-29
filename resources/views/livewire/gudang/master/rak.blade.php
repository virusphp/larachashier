<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Rak</h4>
                    <div class="flex-shrink-0 row g-2">
                        <div class="col">
                            <input class="form-control form-control-sm float-end" type="text"
                                placeholder="Search for Fruits..." wire:model.live="search">
                        </div>
                        <div class="col">
                            <a wire:navigate href="/gudang/rak/create" class="btn btn-sm btn-success float-end"><i
                                    class="bx bx-plus"></i>
                                Tambah</a>
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
                                                <th scope="col">Nama</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dataRak as $rak)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $rak->nama_rak }}</td>
                                                <td>
                                                    <a wire:navigate href="/gudang/rak/{{ $rak->no  }}/edit"
                                                        class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        wire:click="delete({{ $rak->id }})"><i
                                                            class="bx bx-trash"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{ $dataRak->links() }}
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