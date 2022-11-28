<nav class="hidden md:block w-1/6 min-h-screen">
    <div class="header px-3 py-4 flex flex-row justify-between">
        {{-- logo --}}
        {{-- <x-application-logo class="block h-12 p-2 rounded-md fill-current text-white bg-space" /> --}}
        <i
            class="fa-solid fa-fan fa-xl flex justify-center items-center h-12 w-12 rounded-md fill-current text-white bg-space"></i>
        <h2 class=" text-center m-auto font-bold text-xl text-space ">{{ __('WTurbine') }}</h2>
    </div>
    <div class="menu">
        <a href="/dashboard">
            <livewire:menu :type="'pager'" :name="'Dashboard'">
        </a>
        <a href="/solar">
            <livewire:menu :type="'solar-panel'" :name="'Solar Panel'">
        </a>
        <a href="/batt">
            <livewire:menu :type="'battery-full'" :name="'Battery'">
        </a>
        <a href="/wind">
            <livewire:menu :type="'wind'" :name="'Wind'">
        </a>
    </div>
</nav>
