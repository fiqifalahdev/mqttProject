<div>
    <div class="mt-24 md:flex md:flex-wrap md:justify-evenly mb-3 mx-3">

        {{-- 
            energy tersimpan nilai ✓
            intensitas cahaya nilai ✓
            kecepatan angin nilai km/h
            kelembaban nilai persen
            arah mata angin derajat trus nanti diconvert jadi arah 
            curah hujan bar chart
    --}}
        <livewire:card :header="'Energy'" :values="$energy->message" :wire:key="$energy->id" />
        <livewire:card :header="'Humidity'" :values="$humidity->message" :wire:key="$humidity->id" />
        <livewire:card :header="'Intensity'" :values="$intensity->message" :wire:key="$intensity->id" />
        <livewire:card :header="'Wind Direction'" :values="$windPoint->message" :wire:key="$windPoint->id" />
        <livewire:card :header="'Wind Speed'" :values="$windSpeed->message" :wire:key="$windSpeed->id" />
    </div>
    <livewire:chart :chartName="'testingChart'" :chartSize="'w-[80vw]'" :type="'bar'" :className="'mx-4'" />
    @push('scripts')
        <script>
            setInterval(() => {
                Livewire.emit('change');
            }, 2000);
        </script>
    @endpush
</div>
