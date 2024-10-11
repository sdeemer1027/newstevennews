<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Blogs
        </h2>
    </x-slot>

    <div class="py-0">



        <div class="w-full mx-auto px-4">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white dark:text-white">
                    <div class="container-fluid my-5">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="about-me">
                                    <h3>Categories</h3>
                                    <hr>
                                    <p>Laravel</p>
                                    <p>PHP</p>
                                    <p>MySql</p>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog-list">
                                    <h3>Latest Blogs</h3>
                                    <!-- Blog links will go here -->
                                    {{--$blogs--}}
                                    @foreach($blogs as $blog)
                                        <li><a href="{{route('blogs.show', $blog->slug)}}" >{{$blog->title}}</a></li>
                                         <div>
                         {{--           <hr>{!! $blog->content !!} --}}
                                        </div>
                                    <p>Posted by Dr.Steve on {{ $blog->created_at->format('M d Y') }}</p>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>



