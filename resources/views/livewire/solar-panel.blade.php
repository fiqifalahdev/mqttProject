<div>
    <div class="mt-24 md:flex md:flex-wrap md:justify-evenly mb-3 mx-3 md:mx-0">
        <livewire:gauge :gaugeName="'pvVolt'" :data="$pvVolt" :fetchData="'changedPvVolt'" />
        <livewire:gauge :gaugeName="'pvPower'" :data="$pvPower" :fetchData="'changedPvPower'" />
        <livewire:gauge :gaugeName="'pvEnergy'" :data="$pvEnergy" :fetchData="'changedPvEnergy'" />
        <livewire:gauge :gaugeName="'pvCurrent'" :data="$pvCurrent" :fetchData="'changedPvCurrent'" />

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
