@props(['active' => false])

<div class="flex justify-center">
    <a class="{{ $active ? 'bg-red-500 text-white' : 'text-[#272835] bg-gray-300 hover:bg-[#DFE1E6] my-2' }} font-semibold rounded-full px-4 py-2 text-sm w-32 flex justify-center"
       aria-current="{{ $active ? 'page' : 'false' }}"
        {{ $attributes }}
    >
        {{ $slot }}
    </a>
</div>

