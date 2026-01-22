@props(['active' => false])

<a
    {{ $attributes->merge([
        'class' =>
            'relative px-1 py-2 transition
             hover:text-sky-300 ' .
            ($active
                ? 'text-sky-300 after:absolute after:left-0 after:-bottom-1 after:h-[2px] after:w-full after:bg-sky-300'
                : 'text-white/80')
    ]) }}
>
    {{ $slot }}
</a>
