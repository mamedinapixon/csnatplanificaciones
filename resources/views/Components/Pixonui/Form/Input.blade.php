@props(['for'])
<input {{ $attributes->class(['w-full max-w-xs input input-bordered','border-red-600' => $errors->get($for)])->merge(['type' => 'text']) }} />