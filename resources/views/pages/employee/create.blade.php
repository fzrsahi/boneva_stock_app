<x-app-layout>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-slate-300 p-6 shadow-lg sm:rounded-lg">
                @if ($errors->any())
                    <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <span class="font-medium">Mohon Diperhatikan</span>
                        @foreach ($errors->all() as $error)
                            {{ $error }},
                        @endforeach
                    </div>
                @elseif(session('success'))
                    <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endif
                <form class="mx-auto max-w-full" action="{{ route('employee.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-4 gap-4">
                        <div class="col-span-3">
                            <div class="grid grid-cols-2 gap-3">
                                <div class="mb-3">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="fullname">Full Nama</label>
                                    <input
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        id="fullname" name="fullname" type="text" placeholder="Jokowi...."
                                        required />
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="nik">NIK</label>
                                    <input
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        id="nik" name="nik" type="number" placeholder="75040..." required />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="mb-3">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="email">Email</label>
                                    <input
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        id="email" name="email" type="email" required />
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="phone_number">Nomor Telephone</label>
                                    <input
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        id="phone_number" name="phone_number" type="text" required />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="mb-3">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="job_title">Posisi</label>
                                    <input
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        id="job_title" name="job_title" type="text" required />
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="hire_date">Tanggal Bergabung</label>
                                    <input
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        id="hire_date" name="hire_date" type="date" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                    for="department">Tempat Bekerja</label>
                                <input
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    id="department" name="department" type="text" required />
                            </div>
                        </div>

                        <!-- Another Profile Card -->
                        <div
                            class="rounded-lg border border-gray-200 bg-white p-3 shadow dark:border-gray-700 dark:bg-gray-800">
                            <div class="flex items-center justify-center p-5">
                                <img class="h-32 w-32 object-cover" id="imagePreview"
                                    src="{{ asset('profilephoto/defaultprofile.jpg') }}" alt="" />
                            </div>
                            <div class="mt-3">

                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Upload file</label>
                                <input
                                    class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                                    id="file_input" name="profilephoto" type="file"
                                    aria-describedby="file_input_help" onchange="previewImage(event)">
                            </div>

                        </div>
                    </div>


                    <button
                        class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                        type="submit">Submit</button>
                </form>


            </div>
        </div>
    </div>
    @push('after-scripts')
        <script>
            // Menunggu hingga DOM sepenuhnya dimuat
            document.addEventListener('DOMContentLoaded', function() {
                // Fungsi untuk preview gambar
                function previewImage(event) {
                    const file = event.target.files[0]; // Ambil file yang dipilih
                    const reader = new FileReader();
                    console.log(file);


                    // Ketika file berhasil dibaca, tampilkan preview gambar
                    reader.onload = function() {
                        const imagePreview = document.getElementById('imagePreview');
                        imagePreview.src = reader.result; // Update sumber gambar dengan file yang dibaca
                    };

                    if (file) {
                        reader.readAsDataURL(file); // Membaca file sebagai data URL
                    }
                }

                // Menambahkan event listener ke elemen input
                const fileInput = document.getElementById('file_input');
                fileInput.addEventListener('change', previewImage);
            });
        </script>
    @endpush
</x-app-layout>
