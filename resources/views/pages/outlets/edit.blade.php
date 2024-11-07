<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (Session::has('success'))
                        <div class="mb-4 flex w-full max-w-full items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
                            id="toast-success" role="alert">
                            <div
                                class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200">
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal">{{ Session::get('success') }}</div>
                            <button
                                class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                                data-dismiss-target="#toast-success" type="button" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    @elseif(Session::has('error'))
                        <div class="mb-4 flex w-full max-w-full items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
                            id="toast-danger" role="alert">
                            <div
                                class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-red-100 text-red-500 dark:bg-red-800 dark:text-red-200">
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                                </svg>
                                <span class="sr-only">Error icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal">{{ Session::get('error') }}</div>
                            <button
                                class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                                data-dismiss-target="#toast-danger" type="button" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    @elseif($errors->any())
                        <div class="mb-4 flex w-full max-w-full items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
                            id="toast-danger" role="alert">
                            <div
                                class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-red-100 text-red-500 dark:bg-red-800 dark:text-red-200">
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                                </svg>
                                <span class="sr-only">Error icon</span>
                            </div>
                            @foreach ($errors->all() as $error)
                                <div class="ms-3 text-sm font-normal">{{ $error }}</div>
                            @endforeach
                            <button
                                class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                                data-dismiss-target="#toast-danger" type="button" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    @endif
                    <div class="grid grid-cols-4 gap-3">
                        <div>
                            <form class="mx-auto max-w-sm" action="{{ route('outlet.update', $outlet->id) }}"
                                method="post">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="text">Name Otlet</label>
                                    <input
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        id="text" name="outlet_name" type="text"
                                        value="{{ $outlet->outlet_name }}" required />
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="text">Name Pemilik</label>
                                    <input
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        id="text" name="owner_name" type="text"
                                        value="{{ $outlet->owner_name }}" required />
                                </div>
                                <div class="mb-3">

                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="desc">Deskripsikan Tentang Otlet</label>
                                    <textarea
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        id="desc" name="desc" rows="4" placeholder="Write your thoughts here...">{{ $outlet->desc }}</textarea>

                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="desc">Alamat</label>
                                    <textarea
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        id="desc" name="address" rows="4" placeholder="Write your thoughts here...">{{ $outlet->address }}</textarea>

                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="mb-3">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                            for="latitude">Latitude</label>
                                        <input
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                            id="latitude" name="latitude" type="text"
                                            value="{{ $outlet->latitude }}" required readonly />
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                            for="langtitude">Langtitude</label>
                                        <input
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                            id="langtitude" name="langtitude" type="text"
                                            value="{{ $outlet->langtitude }}" required readonly />
                                    </div>
                                </div>

                                <button
                                    class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                                    type="submit">Submit</button>
                            </form>

                        </div>
                        <div class="col-span-3">
                            <div class="h-full w-full" id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('after-scripts')
        <script>
            const customIconSVG = L.icon({
                iconUrl: 'data:image/svg+xml;base64,' + btoa(`
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-6">
  <path d="M19.006 3.705a.75.75 0 1 0-.512-1.41L6 6.838V3a.75.75 0 0 0-.75-.75h-1.5A.75.75 0 0 0 3 3v4.93l-1.006.365a.75.75 0 0 0 .512 1.41l16.5-6Z" />
  <path fill-rule="evenodd" d="M3.019 11.114 18 5.667v3.421l4.006 1.457a.75.75 0 1 1-.512 1.41l-.494-.18v8.475h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3v-9.129l.019-.007ZM18 20.25v-9.566l1.5.546v9.02H18Zm-9-6a.75.75 0 0 0-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75H9Z" clip-rule="evenodd" />
</svg>

        `),
                iconSize: [32, 32], // Menyesuaikan ukuran ikon
                iconAnchor: [16, 32], // Titik jangkar di bagian bawah
                popupAnchor: [0, -32] // Posisi popup di atas marker
            });
            // Menambahkan marker untuk kota-kota di Provinsi Gorontalo
            const cities = L.layerGroup();
            @if ($datas)
                @foreach ($datas as $data)
                    const {{ str_replace(' ', '', $data->outlet_name) }} = L.marker([{{ $data->latitude }},
                        {{ $data->langtitude }}
                    ], {
                        icon: customIconSVG
                    }).bindPopup(
                        'Nama : {{ $data->outlet_name }} <br> Tentang : {{ $data->desc }} <br> Pemilik : {{ $data->owner_name }}'
                    ).addTo(cities);
                @endforeach
            @endif
            const satelliteLayer = L.tileLayer(
                'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="https://www.esri.com/">Esri</a> | Data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                });
            // Menambahkan layer peta OpenStreetMap
            const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            });

            // Menambahkan layer peta dari Humanitarian OpenStreetMap Team
            const osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
            });

            // Menambahkan layer peta Stamen (Street View)
            const stamenToner = L.tileLayer('https://{s}.tile.stamen.com/toner/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://stamen.com">Stamen Design</a> | Map data: <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                maxZoom: 19
            });

            const stamenTerrain = L.tileLayer('https://{s}.tile.stamen.com/terrain/{z}/{x}/{y}.jpg', {
                attribution: '&copy; <a href="https://stamen.com">Stamen Design</a> | Map data: <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                maxZoom: 19
            });

            // Inisialisasi peta dengan pusat di Gorontalo
            const map = L.map('map', {
                center: [0.8055527292865906, 122.61548603646959], // Koordinat Kota Gorontalo
                zoom: 10,
                layers: [osm, cities] // Gunakan layer OpenStreetMap dan cities di awal
            });

            // Definisi base layers
            const baseLayers = {
                'OpenStreetMap': osm,
                'OpenStreetMap.HOT': osmHOT,
                'Stamen Toner': stamenToner,
                'Stamen Terrain': stamenTerrain,
                'Satelit': satelliteLayer
            };

            // Definisi overlay layers
            const overlays = {
                'Cities': cities
            };

            // read longlat
            @if ($outlet)
                var marker = L.marker([{{ $outlet->latitude }},
                    {{ $outlet->langtitude }}
                ], {
                    draggable: true
                }).addTo(map);

                marker.on('dragend', function(event) {
                    var marker = event.target;
                    var position = marker.getLatLng();
                    document.getElementById("latitude").value = position.lat;
                    document.getElementById("langtitude").value = position.lng;
                });
            @endif


            // Menambahkan kontrol layer
            const layerControl = L.control.layers(baseLayers, overlays).addTo(map);


            // Menambahkan layer group untuk taman
            const parks = L.layerGroup([taman1, taman2]);

            // Menambahkan layer OpenTopoMap
            const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
            });

            // Menambahkan layer control
            layerControl.addBaseLayer(openTopoMap, 'OpenTopoMap');
            layerControl.addOverlay(parks, 'Parks');
        </script>
    @endpush

</x-app-layout>
