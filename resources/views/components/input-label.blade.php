@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-base text-black dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
