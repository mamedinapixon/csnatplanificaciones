@props(['for'])
@error($for)
<p {{ $attributes->merge(['class'=>'mt-2 text-sm text-red-600 dark:text-red-600'])}}><span class="font-medium">Oops!</span> {{ $message }}</p>
@enderror
