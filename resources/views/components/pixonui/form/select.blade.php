@props(['items','value','caption','selectid'=>0])
<select class="select select-bordered" {{ $attributes }}>
    <option value="null" disabled>Seleccione una opcion</option>
    @foreach ($items as $item)
        @if ($selectid == $item[$value])
            <option value="{{ $item[$value] }}"  wire:key="item-{{ $item[$value] }}" selected>
                {{ $item[$caption] }}
            </option>
        @else
            <option value="{{ $item[$value] }}"  wire:key="item-{{ $item[$value] }}">
                {{ $item[$caption] }}
            </option>
        @endif
    @endforeach
</select>
