<x-app-layout>
    {{-- Dashboard --}}
    {{-- Card --}}
    <div class="mt-24 flex flex-wrap justify-evenly mb-3">
        <livewire:testing-mqtt />
        {{-- Voltase --}}
        {{-- <div
            class="voltage flex justify-between w-full md:w-[270px] lg:w-[350px] bg-slate-50 rounded-md shadow-sm py-1 px-2 mb-2 border-2 border-l-2 border-l-slate-700">
            <div class="header flex flex-col justify-between">
                <h2 class="font-semibold text-base text-slate-400 ml-1">voltage</h2>
                <livewire:card :className="'text-slate-600 text-4xl font-semibold'" :unit="'100 V'">
            </div>
            <div class="body flex flex-row justify-between w-1/2 ">
                <livewire:card :className="'text-slate-400 text-base font-semibold'" :unit="'14 W'">
                    <livewire:card :className="'text-slate-400 text-base font-semibold'" :unit="'100 A'">
                        <livewire:card :className="'text-slate-400 text-base font-semibold'" :unit="'10 WP'">
            </div>
        </div> --}}
        {{-- Wind --}}
        {{-- <div
            class="wind flex justify-between w-full md:w-[270px] lg:w-[350px] bg-slate-50 rounded-md shadow-sm border-2 border-l-2 border-l-slate-700 py-1 px-2 mb-2">
            <div class="header flex flex-col justify-between">
                <h2 class="font-semibold text-base text-slate-400 ml-1">wind</h2>
                <livewire:card :className="'text-slate-600 text-4xl font-semibold'" :unit="'100 V'">
            </div>
            <div class="body flex flex-row">
                <livewire:card :className="'text-slate-400 text-base font-semibold'" :unit="'100 A'">
            </div>
        </div> --}}
        {{-- Battery --}}
        {{-- <div
            class="battery flex justify-between w-full md:w-[270px] lg:w-[350px] bg-slate-50 rounded-md shadow-sm border-2 border-l-2 border-l-slate-700 py-1 px-2 mb-2">
            <div class="header flex flex-col justify-between">
                <h2 class="font-semibold text-base text-slate-400 ml-1">battery</h2>
                <livewire:card :className="'text-slate-600 text-4xl font-semibold'" :unit="'100 V'">
            </div>
            <div class="body flex flex-row justify-between w-1/3">
                <livewire:card :className="'text-slate-400 text-base font-semibold'" :unit="'14 W'">
                    <livewire:card :className="'text-slate-400 text-base font-semibold'" :unit="'10 mAh'">
            </div>
        </div>
    </div> --}}
        {{-- Chart --}}
        {{-- <div class="flex flex-wrap justify-evenly">
            <div
                class="w-[150px] md:w-[350px] md:h-[100px] h-[150px] bg-white rounded-sm shadow-sm flex flex-col justify-center items-center border-2 border-l-2 border-l-slate-700">
                <h4 class="text-xs font-light text-slate-700">Energi yang tersimpan</h4>
                <h2 class="text-3xl font-semibold text-slate-700">100 WP</h2>
            </div>
            <div
                class="w-[150px] md:w-[350px] md:h-[100px] h-[150px] bg-white rounded-sm shadow-sm flex flex-col justify-center items-center border-2 border-l-2 border-l-slate-700">
                <h4 class="text-xs font-light text-slate-700">Intensitas cahaya</h4>
                <h2 class="text-3xl font-semibold text-slate-700">100 cd</h2>
            </div>
            <div
                class="w-[150px] md:w-[350px] md:h-[100px] h-[150px] bg-white rounded-sm shadow-sm flex flex-col justify-center items-center border-2 border-l-2 border-l-slate-700">
                <h4 class="text-xs font-light text-slate-700">Kecepatan Angin</h4>
                <h2 class="text-3xl font-semibold text-slate-700">100 Km/h</h2>
            </div>
        </div> --}}
        {{-- 
        energy tersimpan nilai ✓
        intensitas cahaya nilai ✓
        curah hujan bar chart
        kecepatan angin nilai km/h
        kelembaban nilai persen
        arah mata angin derajat trus nanti diconvert jadi arah 
    --}}
</x-app-layout>
