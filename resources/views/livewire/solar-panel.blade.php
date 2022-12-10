<div>
    <div class="mt-24 md:flex md:flex-wrap md:justify-evenly mb-3 mx-3 md:mx-0">
        <livewire:gauge :gaugeName="'pvVolt'" :data="$pvVolt->message" :fetchData="'changedPvVolt'" />
        <livewire:gauge :gaugeName="'pvPower'" :data="$pvPower->message" :fetchData="'changedPvPower'" />
        <livewire:gauge :gaugeName="'pvEnergy'" :data="$pvEnergy->message" :fetchData="'changedPvEnergy'" />
        <livewire:gauge :gaugeName="'pvCurrent'" :data="$pvCurrent->message" :fetchData="'changedPvCurrent'" />

        {{-- <livewire:chart :chartName="'currentChart'" :chartSize="'w-[80vw] h-[20vw]'" :type="'line'" :className="'mx-auto mt-10 w-[80vw]'" :data="$pvCurrent" /> --}}
    </div>
    @push('scripts')
        <script>
            setInterval(() => {
                Livewire.emit('change');
            }, 2000);
        </script>
    @endpush
</div>
