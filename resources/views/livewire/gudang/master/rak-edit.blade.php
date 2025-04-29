<div>
    <div class="col-xxl-6 col-sm-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Form Edit Rak</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <form wire:submit="store">
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="nama_rak" class="form-label">Nama Rak</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="nama_rak" name="nama_rak"
                                    placeholder="Nama rak" wire:model="nama_rak" required>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
</div>