<div class="relative flex justify-center max-w-[400px]" id="navbar">
    <div class="top-0 left-0 h-full max-w-[200px] w-full z-50 transition-transform duration-500"
         style="{{'transform: translateX(0);'}}" id="menu">
        <x-nav.nav-link href="/sluzby" :active="request()->is('sluzby')">{{ __('Dashboard') }}</x-nav.nav-link>
        <x-nav.nav-link href="/devices" :active="request()->is('devices')">{{ __('Devices') }}</x-nav.nav-link>
        <x-nav.nav-link href="/aplikacie"
                        :active="request()->is('aplikacie')">{{ __('Partneri') }}</x-nav.nav-link>
        <x-nav.nav-link href="/onas" :active="request()->is('onas')">{{ __('Pouzivatelia') }}</x-nav.nav-link>
        <x-nav.nav-link href="/vzdelavanie"
                        :active="request()->is('vzdelavanie')">{{ __('Produkty') }}</x-nav.nav-link>
        <x-nav.nav-link href="/faq" :active="request()->is('faq')">{{ __('Servis') }}</x-nav.nav-link>
        <x-nav.nav-link href="/kontakt" :active="request()->is('kontakt')">{{ __('Kalibracia') }}</x-nav.nav-link>
        <x-nav.nav-link href="/kontakt" :active="request()->is('kontakt')">{{ __('Subscription') }}</x-nav.nav-link>
        <x-nav.nav-link href="/kontakt" :active="request()->is('kontakt')">{{ __('Reports') }}</x-nav.nav-link>
        <x-nav.nav-link href="/kontakt" :active="request()->is('kontakt')">{{ __('Fakturacia') }}</x-nav.nav-link>
    </div>
</div>
