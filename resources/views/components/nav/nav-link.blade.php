@props(['active' => false])

<div class="flex justify-ri">
    <a class="{{ $active ? 'bg-red-500 text-white' : 'text-[#272835] hover:bg-[#DFE1E6] hover:text-black' }} font-semibold rounded-full px-4 py-2 text-sm"
       aria-current="{{ $active ? 'page' : 'false' }}"
        {{ $attributes }}
    >
        {{ $slot }}
    </a>
</div>

