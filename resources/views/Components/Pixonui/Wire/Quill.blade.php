@props(['ref'])
<div class="w-full mt-1 bg-white" wire:ignore>
    <div
    class="prose-sm prose text-justify rounded-md shadow-sm form-input sm:prose lg:prose-md xl:prose-lg"
    x-data="{ texto: '', stop: true }"
    x-ref="{{ $ref }}"
    x-init="
        quill{{ $ref }} = new Quill($refs.{{ $ref }}, {theme: 'bubble'});
        quill{{ $ref }}.root.innerHTML = @this.get('{{ $attributes->get('wire:model') }}');
        quill{{ $ref }}.on('text-change', function () {
            if(stop) {stop = false; return;}
            @this.set('{{ $attributes->get('wire:model') }}', quill{{ $ref }}.root.innerHTML, true);
        });
        quill{{ $ref }}.on('selection-change', function(range, oldRange, source) {
            if (!range) {
                @this.set('{{ $attributes->get('wire:model') }}', quill{{ $ref }}.root.innerHTML, false);
            }
          });
    "
    >
    </div>
</div>