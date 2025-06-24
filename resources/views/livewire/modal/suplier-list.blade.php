<div class="p-0">
    <h5 class="text-star mb-1">
        {{ $title ?? 'Modal' }}
    </h5>
    <div class="input-group mb-3">
        <input type="text" class="form-control @error('search') is-invalid @enderror" placeholder="Cari Suplier..."
            wire:model="search">
        @error('search')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($supliers as $sup)
                <tr>
                    <td>{{ $sup->kode_suplier }}</td>
                    <td>{{ $sup->nama_suplier }}</td>
                    <td>{{ $sup->alamat }}</td>
                    <td>
                        <button class="btn btn-sm btn-success"
                            wire:click="selectSuplier('{{ $sup->kode_suplier }}')">Pilih</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>