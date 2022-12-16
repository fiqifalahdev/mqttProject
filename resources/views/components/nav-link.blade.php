@props(['active'])

@php
    $classes = $active == false ? 'flex w-full hover:border-r-2 hover:border-space hover:font-semibold text-slate-600 px-3 py-2  items-center duration-300 ease-out transition-all' : 'flex w-full border-r-2 border-space font-semibold text-slate-600 px-3 py-2 items-center duration-300 ease-out transition-all';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
