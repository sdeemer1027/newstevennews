<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <span style="color:#e97855;">S</span>teven.<span style="color:#e97855;">News</span>
        </h2>
    </x-slot>

    <div class="py-3">



        <div class="w-full mx-auto px-3">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg bg-black text-white">
                <div class="p-6 text-white dark:text-white">
                    <div class="container-fluid my-5">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="about-me">
                                    <h3>Categories</h3>
                                    <ul>
                                        @foreach($blog->categories as $category)
                                            <li>{{ $category->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="blog-list">
                                    <div class="card bg-gray-400 ">
                                        <div class="card-header">{{$blog->title}}</div>
                                        <div class="card-body bg-black text-white">
                                            {!! $blog->content !!}
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



