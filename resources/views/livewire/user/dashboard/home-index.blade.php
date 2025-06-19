<div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="container px-6 mx-auto md:container md:mx-auto ">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="col-md-12">
                        <div class="card">
                            <div>
                                @if (session()->has('user-message'))
                                <div class="alert alert-success">
                                    {{ session('user-message') }}
                                </div>
                                @endif
                            </div>
                            {{-- <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5"> --}}
                                <div class="w-full overflow-x-auto">
                                    <div>
                                        <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                                            <div class="flex flex-col">
                                                <h2 class=" my-6 text-2xl font-semibold text-gray-700
        dark:text-gray-200">
                                                    Dashboard Portal Insiden
                                                </h2>
                                                <div>
                                                    @if (session()->has('success'))
                                                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                                        role="alert">
                                                        <span class="font-medium">Success!</span> {{
                                                        session('success') }}
                                                    </div>
                                                    @endif
                                                    @if (session()->has('error'))
                                                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                                        role="alert">
                                                        <span class="font-medium">Danger alert!</span> {{
                                                        session('error') }}
                                                    </div>
                                                    @endif
                                                </div>
                                                <div
                                                    class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                                    <div class="flex flex-row">

                                                        <div
                                                            class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 basis-1/4">
                                                            <a href="{{route('pelatihan.user')}}">
                                                                <h5
                                                                    class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                                                    {{ $kelas_aktif}}
                                                                </h5>
                                                            </a>
                                                            <h2 class="text-center text-xl mb-5">Request Draf
                                                            </h2>
                                                            <center>
                                                                <a href="{{route('pelatihan.user')}}"
                                                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                        class="fas fa-fw fa-eye"></i> View Data</a>
                                                            </center>
                                                        </div>
                                                        <div
                                                            class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 basis-1/4">
                                                            <a href="">
                                                                <h5
                                                                    class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                                                    {{$kelas_inproses}}
                                                                </h5>
                                                            </a>
                                                            <h2 class="text-center text-xl mb-5">In Progres

                                                            </h2>
                                                            <center>
                                                                <a href=""
                                                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                                                        class="fas fa-fw fa-edit"></i>view Data</a>
                                                            </center>
                                                        </div>
                                                        <div
                                                            class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 basis-1/4">
                                                            <a href="">
                                                                <h5
                                                                    class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                                                    {{ $kelas_history }}
                                                                </h5>
                                                            </a>
                                                            <h2 class="text-center text-xl mb-5">Reject
                                                            </h2>
                                                            <center>
                                                                <a href=""
                                                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-yellow-500 border border-transparent rounded-lg active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow"><i
                                                                        class="fas fa-fw fa-eye"></i>view Data</a>
                                                            </center>

                                                        </div>
                                                        <div
                                                            class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 basis-1/4">
                                                            <a href="">
                                                                <h5
                                                                    class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                                                    {{ $kelas_sertifikat}}
                                                                </h5>
                                                            </a>
                                                            <h2 class="text-center text-xl mb-5">History
                                                            </h2>
                                                            <center>
                                                                <a href=""
                                                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                                                        class="fas fa-fw fa-print"></i>view Data</a>
                                                            </center>
                                                        </div>
                                                    </div>
                                                    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
                                                        <div class="w-full overflow-x-auto">
                                                            <table class="min-w-full whitespace-no-wrap"
                                                                wire:loading.remove>
                                                                <thead>
                                                                    <tr
                                                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                                                                        <th class="px-4 py-3">Paramter</th>
                                                                        <th class="px-4 py-3">Keterangan</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                                        <td class="px-4 py-3">
                                                                            Nik</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ auth()->user()->nik}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                                        <td class="px-4 py-3">
                                                                            Nama</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ auth()->user()->first_name}} {{
                                                                            auth()->user()->last_name}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                                        <td class="px-4 py-3">
                                                                            Email</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ auth()->user()->email}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                                        <td class="px-4 py-3">
                                                                            Unit</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ auth()->user()->unit->nama_unit}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                                        <td class="px-4 py-3">
                                                                            Level User</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ auth()->user()->level}}
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{--
                                </div> --}}