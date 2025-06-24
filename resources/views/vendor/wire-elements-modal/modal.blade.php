<div>
    @isset($jsPath)
    <script>
        {!! file_get_contents($jsPath) !!}
    </script>
    @endisset
    @isset($cssPath)
    <style>
        {
             ! ! file_get_contents($cssPath) ! !
        }
    </style>
    @endisset

    <div wire:ignore.self class="modal fade" id="livewireModal" tabindex="-1" aria-labelledby="livewireModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    @forelse($components as $id => $component)
                    <div wire:key="{{ $id }}">
                        @livewire($component['name'], $component['arguments'], key($id))
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('openModal', () => {
            let modal = new bootstrap.Modal(document.getElementById('livewireModal'));
            modal.show();
        });
    
        window.addEventListener('closeModal', () => {
            let modal = bootstrap.Modal.getInstance(document.getElementById('livewireModal'));
            if (modal) {
                modal.hide();
            }
        });
    </script>
</div>