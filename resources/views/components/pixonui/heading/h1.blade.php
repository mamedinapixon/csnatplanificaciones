@props([
    'action' => null
])
<h1 class=" block md:flex text-center items-center justify-center md:justify-between mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
    <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
        {{ $slot }}
    </span>
    @if($action)
    <div class="alert-title mt-4 md:mt-0">{{ $action }}</div>
    @endif
</h1>
