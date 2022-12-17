<div>
    <div class="mt-24 md:flex md:flex-wrap md:justify-evenly mb-3 mx-3 md:mx-0">

        {{-- Gauge Components --}}
        <livewire:gauge :gaugeName="'batteryVolt'" :data="$battVolt->message" :fetchData="'changedVolt'" />
        <livewire:gauge :gaugeName="'batteryPower'" :data="$battPower->message" :fetchData="'changedPower'" />
        <livewire:gauge :gaugeName="'batteryEnergy'" :data="$battEnergy->message" :fetchData="'changedEnergy'" />
        <livewire:gauge :gaugeName="'batteryCurrent'" :data="$battCurrent->message" :fetchData="'changedCurrent'" />

        <livewire:chart :chartName="'Trend Chart'" :className="'mx-auto mt-10 w-[80vw]'" :data="$chartData" />
    </div>
    @push('scripts')
        <script>
            setInterval(() => {
                Livewire.emit('change');
            }, 2000);
        </script>
    @endpush
</div>
