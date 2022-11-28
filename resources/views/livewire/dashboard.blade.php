<div>
    <div class="mt-24 md:flex md:flex-wrap md:justify-evenly mb-3 mx-3 md:mx-0">

        {{-- 
            energy tersimpan nilai ✓
            intensitas cahaya nilai ✓
            kecepatan angin nilai km/h
            kelembaban nilai persen
            arah mata angin derajat trus nanti diconvert jadi arah 
            curah hujan bar chart
    --}}
        {{-- :key tidak boleh berisi nilai yang sama dan harus unique --}}
        <livewire:card :header="'Humidity'" :values="$humidity->message" :key="Str::random()" />
        <livewire:card :header="'Intensity'" :values="$intensity->message" :key="Str::random()" />
        <livewire:card :header="'Wind Direction'" :values="$windPoint->message" :key="Str::random()" />
        <livewire:card :header="'Wind Speed'" :values="$windSpeed->message" :key="Str::random()" />
        <livewire:chart :chartName="'curHujanChart'" :chartSize="'w-[80vw] h-[20vw]'" :type="'line'" :className="'mx-auto mt-10 w-[80vw]'"
            :data="$rainfall" />
    </div>

    @push('scripts')
        <script>
            setInterval(() => {
                Livewire.emit('change');
            }, 2000);
        </script>
    @endpush
</div>
