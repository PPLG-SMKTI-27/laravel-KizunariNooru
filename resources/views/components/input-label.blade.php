@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-display text-sm font-semibold text-blue-300/80 mb-2 transition-colors duration-300 group-focus-within:text-cyan-400']) }}>
    {{ $value ?? $slot }}
</label>
