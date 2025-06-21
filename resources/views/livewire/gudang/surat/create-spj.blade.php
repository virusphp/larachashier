<div>
    @section('sub_title', 'Form SPJ')
    @section('sub_menu', 'Surat')
    @section('menu_active', 'Create SPJ')

    <div class="row">
        <div class="col-xxl-6 col-sm-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Form {{ !empty($noid) ? "Edit" : "Buat" }} SPJ</h4>
                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <form wire:submit="store()">
                            {{-- buatkan form dengan berisi field sebagai berikut
                            'no_spj',
                            'nama_spj', // bisa di pakai untuk keterangan
                            'kode_suplier',
                            'tanggal_spj',
                            'status',
                            'created_by',
                            'updated_by',
                            --}}
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="tanggal_spj" class="form-label  ">Tanggal</label>
                                </div>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input type="text"
                                            class="form-control @error('tanggal_spj') is-invalid @enderror"
                                            id="tanggal_spj" name="tanggal_spj" placeholder="Tanggal SPJ (dd-mm-yyyy)"
                                            wire:ignore value="{{ $tanggal_spj }}" autocomplete="off">
                                        <button id="tanggal_spj_klik" class="btn btn-outline-secondary" type="button"
                                            tabindex="-1">
                                            <i class="ri-calendar-event-line"></i>
                                        </button>
                                    </div>
                                    <small class="text-muted">Format: dd-mm-yyyy</small>
                                    @error('tanggal_spj')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="no_spj" class="form-label">No SPJ</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text"
                                        class="form-control bg-secondary text-white @error('no_spj') is-invalid @enderror"
                                        id="no_spj" name="no_spj" placeholder="No SPJ" wire:model="no_spj" readonly>
                                    @error('no_spj')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="nama_spj" class="form-label">Keterangan SPJ</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('nama_spj') is-invalid @enderror"
                                        id="nama_spj" name="nama_spj" placeholder="Nama SPJ" wire:model="nama_spj"
                                        autofocus>
                                    @error('nama_spj')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="kode_suplier" class="form-label">Suplier</label>
                                </div>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input type="text"
                                            class="form-control @error('kode_suplier') is-invalid @enderror"
                                            id="kode_suplier" name="kode_suplier" placeholder="Kode Suplier"
                                            wire:model="kode_suplier" autofocus>
                                        {{-- cari suplier jika di klik muncul modal atau select 2 atau --}}
                                        <input type="hidden" name="kode_suplier">
                                        <button type="button" class="btn btn-outline-primary">
                                            <i class="ri-search-line"></i> Cari Suplier
                                        </button>
                                    </div>
                                    @error('kode_suplier')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end">
                                <button wire:navigate href="/gudang/surat/spj" type="button"
                                    class="btn btn-info">Kembali</button>
                                <button class="btn btn-{{ !empty($noid) ? 'warning' : 'primary' }}">{{ !empty($noid)
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
@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', () => {
        function initFlatpickrTanggalSpj() {
            console.log('Inisialisasi Flatpickr dijalankan'); // debug log
            const el = document.getElementById('tanggal_spj');
            if (!el || el._flatpickr) return; // Cegah duplikasi

            flatpickr.localize(flatpickr.l10ns.id);

            flatpickr(el, {
                dateFormat: "d-m-Y",
                locale: "id",
                allowInput: true,
                // defaultDate: el.value ? flatpickr.parseDate(el.value, "d-m-Y") : null, //ini ambil dari value input
                onChange: function (selectedDates, dateStr) {
                    const component = Livewire.find(el.closest('[wire\\:id]').getAttribute('wire:id'));
                    if (component) {
                    component.set('tanggal_spj', dateStr);
                    }
                }
            });

            const btn = document.getElementById('tanggal_spj_klik');
            if (btn) {
                btn.addEventListener('click', () => {
                    el.focus();
                });
            }
        }

        // Inisialisasi saat pertama kali
        initFlatpickrTanggalSpj();

        // Inisialisasi ulang setelah DOM di-update Livewire
        Livewire.hook('message.processed', (message, component) => {
            initFlatpickrTanggalSpj();
        });
    });
</script>
@endpush