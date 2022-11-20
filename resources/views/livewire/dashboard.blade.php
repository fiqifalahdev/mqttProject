<div>
    <div class="mt-24 md:flex md:flex-wrap md:justify-evenly mb-3 mx-3" wire:poll="change">
        @foreach ($collection as $item)
            <livewire:card :header="$item['title']" :topic="$item['topic']" :values="$item['message']" />
        @endforeach
    </div>
    {{-- <livewire:chart :chartName="'testingChart'" :chartSize="'w-[80vw]'" :type="'bar'" :className="'mx-4'" /> --}}
    <script src="{{ asset('js/paho-mqtt.js') }}"></script>
    <script>
        const client = new Paho.MQTT.Client("broker.hivemq.com", Number(8000), "FPS-client");
        const dataChild = JSON.parse(@js($object));
        console.log(dataChild);

        document.addEventListener('livewire:load', function() {
            client.connect({
                reconnect: true,
                onSuccess: function() {
                    console.log("koneksi berhasil");
                    dataChild.forEach(element => {
                        client.subscribe(element.topic);
                    });
                },
            });

            // when message arrived from broker then take the message and insert it directly to the database
            client.onMessageArrived = function(message) {
                console.log(message.destinationName, message.payloadString);
                @this.insert(message.destinationName, message.payloadString);
            };
        });
    </script>
</div>
