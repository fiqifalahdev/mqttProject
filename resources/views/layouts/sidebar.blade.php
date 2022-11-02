<nav class="hidden md:block w-1/6 min-h-screen">
    <div class="header px-3 py-4 flex flex-row justify-between">
        {{-- logo --}}
        <x-application-logo class="block h-12 p-2 rounded-md fill-current text-white bg-space" />
        <h2 class=" text-center m-auto font-bold text-xl text-space ">{{ __('WTurbine') }}</h2>
    </div>
    <div class="menu">
        <livewire:menu :type="'bxs-dashboard'" :name="'Dashboard'">
            <livewire:menu :type="'bxs-sun'" :name="'Solar Panel'">
                <livewire:menu :type="'bxs-battery'" :name="'Battery'">
                    <livewire:menu :type="'bx-wind'" :name="'Wind'">
    </div>
</nav>
