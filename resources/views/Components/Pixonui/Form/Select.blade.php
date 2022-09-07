@props(['items','value','caption'])
<select class="select select-bordered" {{ $attributes }}>
    <option value="null" disabled>Seleccione una opcion</option>
    @foreach ($items as $item)
        <option value="{{ $item[$value] }}"  wire:key="item-{{ $item[$value] }}">
            {{ $item[$caption] }}
        </option>
    @endforeach
</select>