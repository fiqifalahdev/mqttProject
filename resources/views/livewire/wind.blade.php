<div>
    <div class="mt-24 md:flex md:flex-wrap md:justify-evenly mb-3 mx-3 md:mx-0">
        <livewire:gauge :gaugeName="'windVolt'" :data="$windVolt" :fetchData="'changedWindVolt'" />
        <livewire:gauge :gaugeName="'windPower'" :data="$windPower" :fetchData="'changedWindPower'" />
        <livewire:gauge :gaugeName="'windEnergy'" :data="$windEnergy" :fetchData="'changedWindEnergy'" />
        <livewire:gauge :gaugeName="'windCurrent'" :data="$windCurrent" :fetchData="'changedWindCurr'" />

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
