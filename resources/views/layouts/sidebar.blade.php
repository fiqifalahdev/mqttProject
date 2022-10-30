<nav class="w-1/6 min-h-screen relative">
    <div class="header px-3 py-4 flex flex-row justify-between">
        {{-- logo --}}
        <x-application-logo class="block h-12 p-2 rounded-md fill-current text-white bg-space" />
        <h2 class=" text-center m-auto font-bold text-xl text-space ">{{ __('WTurbine') }}</h2>
    </div>
    <div class="menu">
        <livewire:menu :type="'dashboard'" :name="'Dashboard'">
            <livewire:menu :type="'user'" :name="'User'">
                <livewire:menu :type="'devices'" :name="'Devices'">
    </div>
    <div class="absolute bottom-0 w-full">
        <livewire:menu :type="'arrow-to-right'" :name="'Log Out'">
    </div>
</nav>
