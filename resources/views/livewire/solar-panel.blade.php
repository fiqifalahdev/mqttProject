<div>
    <div class="mt-24 md:flex md:flex-wrap md:justify-evenly mb-3 mx-3 md:mx-0">
        <livewire:card :header="'PvPower'" :values="$pvPower->message" :key="Str::random()" />
        <livewire:card :header="'PvEnergy'" :values="$pvEnergy->message" :key="Str::random()" />
        <livewire:card :header="'PvVolt'" :values="$pvVolt->message" :key="Str::random()" />
        <livewire:chart :chartName="'currentChart'" :chartSize="'w-[80vw] h-[20vw]'" :type="'line'" :className="'mx-auto mt-10 w-[80vw]'" :data="$pvCurrent" />
    </div>
    @push('scripts')
        <script>
            setInterval(() => {
                Livewire.emit('change');
            }, 2000);

            Livewire.on('changed', event => {
                console.log(@js($pvVolt->message));
            });
        </script>
    @endpush
</div>
