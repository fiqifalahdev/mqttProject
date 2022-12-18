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
        <livewire:gauge :gaugeName="'windSpeed'" :data="$windSpeed" :fetchData="'windSpeed'" />
        <livewire:gauge :gaugeName="'humidity'" :data="$humidity" :fetchData="'humidity'" />
        <livewire:gauge :gaugeName="'intensity'" :data="$intensity" :fetchData="'intensity'" />
        <livewire:gauge :gaugeName="'rainfall'" :data="$rainfall" :fetchData="'rainfall'" />
        <livewire:card :header="'Wind Direction'" :values="$windPoint" :key="Str::random()" />
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
