@props(['caption', 'value'])
<x-pixonui.show.labeltext :caption="$caption">
    @if ($value == true)
        Si
    @else
        No
    @endif

</x-pixonui.show.labeltext>
