<div class="relative flex items-center"
     id="navbar">
    {{--    <div class="hidden lg:block sm:h-2 lg:h-6 bg-[#F9B323] transition-opacity z-10  ease-in-out flex" id="yellow-bar">--}}
    {{--        <div class="flex justify-end z-10" id="changer">--}}
    {{--            <livewire:components.languageChanger />--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- Logo Section (Left-aligned) -->
    {{--        <a class="text-3xl font-bold leading-none" href="/">--}}
    {{--            <img class="h-10" alt="logo" viewBox="0 0 10240 10240" src="{{ asset('storage/logo.png') }}">--}}
    {{--        </a>--}}
    <!-- Nav Links for Larger Screens (Centered) -->
    <div class="top-0 left-0 h-full max-w-[200px] w-full bg-white z-50 transition-transform duration-500"
         style="{{'transform: translateX(0);'}}" id="menu">
        <x-nav.nav-link href="/sluzby" :active="request()->is('sluzby')">{{ __('Dashboard') }}</x-nav.nav-link>
        <x-nav.nav-link href="/materialy"
                        :active="request()->is('materialy')">{{ __('Zariadenia') }}</x-nav.nav-link>
        <x-nav.nav-link href="/aplikacie"
                        :active="request()->is('aplikacie')">{{ __('Partneri') }}</x-nav.nav-link>
        <x-nav.nav-link href="/onas" :active="request()->is('onas')">{{ __('Pouzivatelia') }}</x-nav.nav-link>
        <x-nav.nav-link href="/vzdelavanie"
                        :active="request()->is('vzdelavanie')">{{ __('Produkty') }}</x-nav.nav-link>
        <x-nav.nav-link href="/faq" :active="request()->is('faq')">{{ __('Servis') }}</x-nav.nav-link>
        <x-nav.nav-link href="/kontakt" :active="request()->is('kontakt')">{{ __('Kalibracia') }}</x-nav.nav-link>
        <x-nav.nav-link href="/kontakt" :active="request()->is('kontakt')">{{ __('Subscription') }}</x-nav.nav-link>
        <x-nav.nav-link href="/kontakt" :active="request()->is('kontakt')">{{ __('Reports') }}</x-nav.nav-link>
        <x-nav.nav-link href="/kontakt" :active="request()->is('kontakt')">{{ __('Fakturaci') }}</x-nav.nav-link>
    </div>

    {{--        <div class="flex items-center lg:block">--}}
    {{--            @if (Route::has('login'))--}}
    {{--                <livewire:welcome.navigation/>--}}
    {{--            @endif--}}
    {{--        </div>--}}

    {{--    <nav x-data="{ open: false }"--}}
    {{--         class="bg-white dark:bg-gray-800 border-b border-gray-light dark:border-gray-700">--}}
    {{--        <div class="-me-2 py-2 flex items-center lg:hidden justify-between">--}}
    {{--            <div class="flex-shrink-0 ml-2 sm:ml-6">--}}
    {{--                <a class="text-3xl font-bold leading-none" href="/">--}}
    {{--                    <img class="h-10" alt="logo" viewBox="0 0 10240 10240" src="{{ asset('storage/logo.png') }}">--}}
    {{--                </a>--}}
    {{--            </div>--}}
    {{--            <div class="flex mr-4 sm:mr-6">--}}
    {{--                <div class="flex items-center lg:block">--}}
    {{--                    @if (Route::has('login'))--}}
    {{--                        <livewire:welcome.navigation/>--}}
    {{--                    @endif--}}
    {{--                </div>--}}
    {{--                <livewire:menu />--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </nav>--}}
</div>
{{--<script>--}}
{{--    function handleScrollVisibility() {--}}
{{--        const changer = document.getElementById('changer');--}}
{{--        const scrollY = window.scrollY;--}}

{{--        // Check if the scroll position is greater than 1px (you can adjust this threshold)--}}
{{--        if (scrollY > 1) {--}}
{{--            // Hide the element by adding 'hidden' and removing 'flex'--}}
{{--            changer.style.display = 'none';--}}
{{--        } else {--}}
{{--            // Show the element by adding 'flex' and removing 'hidden'--}}
{{--            changer.style.display = 'flex';--}}
{{--        }--}}
{{--    }--}}

{{--    // Listen to the scroll event to trigger visibility change--}}
{{--    window.addEventListener('scroll', handleScrollVisibility);--}}

{{--    // Call the function initially in case the page is loaded with a scroll position--}}
{{--    handleScrollVisibility();--}}
{{--</script>--}}
