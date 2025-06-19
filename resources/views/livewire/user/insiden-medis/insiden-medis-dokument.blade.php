<div>

    <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg bg-white ">
        <h2 class=" my-6 text-2xl font-semibold text-gray-700
        dark:text-gray-200">
           Dokument
        </h2>

        <div class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{-- <label class="block text-sm mt-4">Nomor/Judul Dokument :
                {{ $data->nomor_dokument }}/{{ $data->nama_dokument }}</label>
            <label class="block text-sm mt-4">Group / Jenis Dokument : {{ $data->dokument_group->nama_dokument_group }} -
                {{ $data->dokument_jenis->nama_dokument_jenis }}</label> --}}
            <iframe id="fraDisabled" class="h-screen w-full"
                src="{{ asset('storage/' . $dokument_upload) }}#toolbar=0&navpanes=0&scrollbar=0" frameborder="0"></iframe>

            {{-- <label class="block text-sm mt-4">di upload oleh : {{ $data->pelatihan->user->first_name }}
                {{ $data->pelatihan->user->last_name }} - </label> --}}

            <div class="flex mt-6 text-sm">
                <button wire:click="kembali()"
                    class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                    kembali
                </button>
            </div>
        </div>
    </div>
