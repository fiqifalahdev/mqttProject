<x-app-layout>
    {{-- Dashboard --}}
    {{-- Card --}}
    <div class="mt-24 flex flex-wrap justify-evenly">
        {{-- Voltase --}}
        <div
            class="voltage flex justify-between w-full md:w-[270px] lg:w-[350px] bg-slate-50 rounded-md shadow-md py-1 px-2 mb-2">
            <div class="header flex flex-col justify-between">
                <h2 class="font-semibold text-base text-slate-400 ml-1">voltage</h2>
                <livewire:card :color="'slate-600'" :fontSize="'4xl'" :fontWeight="'bold'" :unit="'100 V'">
            </div>
            <div class="body flex flex-col items-end">
                <livewire:card :color="'slate-400'" :fontSize="'base'" :fontWeight="'semibold'" :unit="'14 W'">
                    <livewire:card :color="'slate-400'" :fontSize="'base'" :fontWeight="'semibold'" :unit="'10 A'">
                        <livewire:card :color="'slate-400'" :fontSize="'base'" :fontWeight="'semibold'" :unit="'100 WP'">
            </div>
        </div>
        {{-- Wind --}}
        <div
            class="wind flex justify-between w-full md:w-[270px] lg:w-[350px] bg-slate-50 rounded-md shadow-md py-1 px-2 mb-2">
            <div class="header flex flex-col justify-between">
                <h2 class="font-semibold text-base text-slate-400 ml-1">wind</h2>
                <livewire:card :color="'slate-600'" :fontSize="'4xl'" :fontWeight="'bold'" :unit="'200 V'">
            </div>
            <div class="body flex flex-col items-end">
                <livewire:card :color="'slate-400'" :fontSize="'base'" :fontWeight="'semibold'" :unit="'10 A'">
            </div>
        </div>
        {{-- Battery --}}
        <div
            class="voltage flex justify-between w-full md:w-[270px] lg:w-[350px] bg-slate-50 rounded-md shadow-md py-1 px-2 mb-2">
            <div class="header flex flex-col justify-between">
                <h2 class="font-semibold text-base text-slate-400 ml-1">battery</h2>
                <livewire:card :color="'slate-600'" :fontSize="'4xl'" :fontWeight="'bold'" :unit="'300 V'">
            </div>
            <div class="body flex flex-col items-end">
                <livewire:card :color="'slate-400'" :fontSize="'base'" :fontWeight="'semibold'" :unit="'14 W'">
                    <livewire:card :color="'slate-400'" :fontSize="'base'" :fontWeight="'semibold'" :unit="'100 WP'">
            </div>
        </div>
    </div>
    {{-- Chart --}}
    {{-- 
        energy tersimpan
        intensitas cahaya
        curah hujan 
        kecepatan angin
        kelembaban
        arah mata angin 
    --}}
</x-app-layout>
