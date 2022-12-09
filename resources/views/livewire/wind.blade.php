<div>
    <div class="mt-24 md:flex md:flex-wrap md:justify-evenly mb-3 mx-3 md:mx-0">
        <livewire:card :header="'WindPower'" :values="$windPower->message" :key="Str::random()" />
        <livewire:card :header="'WindEnergy'" :values="$windEnergy->message" :key="Str::random()" />
        <livewire:card :header="'WindVolt'" :values="$windVolt->message" :key="Str::random()" />
        <livewire:chart :chartName="'WindCurrent'" :chartSize="'w-[80vw] h-[20vw]'" :type="'line'" :className="'mx-auto mt-10 w-[80vw]'" :data="$windCurrent" />
    </div>
    @push('scripts')
        <script>
            setInterval(() => {
                Livewire.emit('change');
            }, 2000);
        </script>
    @endpush
</div>
