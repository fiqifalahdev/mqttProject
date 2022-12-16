<nav class="hidden md:block w-1/6 min-h-screen bg-white drop-shadow-md">
    <div class="header px-3 py-4 flex flex-row justify-between">
        {{-- ganti icons --}}
        <img src="./img/app-logo.png" alt="application-logo" class="w-11">
        <h2 class=" text-center m-auto font-bold text-lg text-space ">{{ __('IIACS') }}</h2>
    </div>
    <div class="menu">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <livewire:menu :type="'book'" :name="'Dashboard'">
        </x-nav-link>
        <x-nav-link :href="route('solar')" :active="request()->routeIs('solar')">
            <livewire:menu :type="'sun'" :name="'Solar Panel'">
        </x-nav-link>
        <x-nav-link :href="route('batt')" :active="request()->routeIs('batt')">
            <livewire:menu :type="'battery'" :name="'Battery'">
        </x-nav-link>
        <x-nav-link :href="route('wind')" :active="request()->routeIs('wind')">
            <livewire:menu :type="'wind'" :name="'Wind'">
        </x-nav-link>
        </a>
    </div>
</nav>
