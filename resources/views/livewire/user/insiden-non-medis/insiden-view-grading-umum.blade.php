<div>
    {{-- <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg"> --}}
    <div class="bg-auto mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
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
                    <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="flex flex-col">
                            <h2 class=" my-6 text-2xl font-semibold text-gray-700">
                                Data Table grade
                            </h2>
                            {{-- <img class="object-cover  w-full" src="{{ asset('assets/img/grading.png') }}"
                                alt="" aria-hidden="true" /> --}}
                            <iframe id="fraDisabled" class="h-screen w-full"
                                src="{{ asset('assets/panduan_grading.pdf') }}#toolbar=0&navpanes=0&scrollbar=0"
                                frameborder="0"></iframe>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
