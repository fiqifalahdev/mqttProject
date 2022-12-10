<div>
    <div class="mt-24 md:flex md:flex-wrap md:justify-evenly mb-3 mx-3 md:mx-0">
        {{-- <livewire:card :header="'battPower'" :values="$battPower->message" :key="Str::random()" />
        <livewire:card :header="'battEnergy'" :values="$battEnergy->message" :key="Str::random()" />
        <livewire:card :header="'battVolt'" :values="$battVolt->message" :key="Str::random()" /> --}}
        <livewire:gauge :gaugeName="'batteryVolt'" :data="$battVolt->message" :fetchData="'changedVolt'" />
        <livewire:gauge :gaugeName="'batteryPower'" :data="$battPower->message" :fetchData="'changedPower'" />
        <livewire:gauge :gaugeName="'batteryEnergy'" :data="$battEnergy->message" :fetchData="'changedEnergy'" />
        {{-- <livewire:chart :chartName="'batteryCurrent'" :chartSize="'w-[80vw] h-[20vw]'" :type="'line'" :className="'mx-auto mt-10 w-[80vw]'" :data="$battCurrent" /> --}}
    </div>
    @push('scripts')
        <script>
            setInterval(() => {
                Livewire.emit('change');
            }, 2000);
        </script>
    @endpush
</div>
