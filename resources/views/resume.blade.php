<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <span style="color:#e97855;">S</span>teven.<span style="color:#e97855;">News</span>
        </h2>
    </x-slot>

    <div class="py-0">



        <div class="w-full mx-auto px-4">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white dark:text-white">
                    <div class="container-fluid my-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="about-me">
                                    <div class="card">
                                        <div class="card-header"> Resume <span style="float:right">Steve Deemer</span></div>
                                        <div class="card-body">
                                                <embed src="{{ asset('Steve-Deemer-Oct-2024.docx.pdf') }}" type="application/pdf" width="100%" height="600px" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>



