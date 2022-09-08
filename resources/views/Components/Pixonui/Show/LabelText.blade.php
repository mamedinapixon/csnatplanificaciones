@props(['caption'])
<x-pixonui.paragraphs.p>
    <strong class="font-semibold text-gray-900 dark:text-white">
        {{ $caption.":" }}
    </strong> {{ $slot }}

</x-pixonui.paragraphs.p>
