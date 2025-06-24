<div x-data="LivewireUIModal()" x-init="init()" x-on:close.stop="setShowPropertyTo(false)"
    x-on:keydown.escape.window="show && closeModalOnEscape()" x-show="show" x-cloak
    class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div x-show="show && showActiveComponent" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-4" class="modal-dialog modal-dialog-centered modal-lg"
            role="document" style="display: none;">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Suplier</h5>
                    <button type="button" class="btn-close" x-on:click="closeModal()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @forelse($components as $id => $component)
                    <div x-show="activeComponent == '{{ $id }}'" x-ref="{{ $id }}" wire:key="{{ $id }}">
                        @livewire($component['name'], $component['arguments'], key($id))
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- BACKDROP --}}
    <div x-show="show" x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="modal-backdrop fade show" style="display: none;"></div>
</div>