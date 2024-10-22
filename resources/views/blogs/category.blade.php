<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Blogs
        </h2>
    </x-slot>
    <div class="py-3">



        <div class="w-full mx-auto px-4">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg  bg-black">
                <div class="p-6 text-white dark:text-white">
                    {{--@include('blogs.crumb.blade.php')--}}
                    <a href="{{route('home')}}">Home</a> -> <a href="{{route('blogs.index')}}">Blogs</a> ->
                    @foreach($blogs as $blog)

                    @endforeach
                    {{$blog->category}}
                    <span style="float:right;"><a href="{{route('blogs.create', $blog->category)}}" class="btn btn-primary">Add New</a></span>
                    <div class="container-fluid my-5">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="about-me">
                                    <h3>Categories</h3>
                                    @include('blogs.categorylist')

                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog-list">
                                    <h3>Latest Blogs</h3>
                                    <!-- Blog links will go here -->
                                    {{--$blogs--}}
                                    <div class="card  bg-black text-white">
                                        <div class="card-header">Posted by Dr.Steve</div>
                                        @foreach($blogs as $blog)
                                            <div class="card-header"><a href="{{route('blogs.show',  [$blog->category, $blog->slug])}}" >[ {{ $blog->created_at->format('M d Y') }} ] {{$blog->title}}</a>

                                            </div>
                                        @endforeach
                                    </div>

                                    {{--$blogs--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toastEl = document.getElementById('toast');
            if (toastEl && "{{ session('toast_message') }}") {
                var toast = new bootstrap.Toast(toastEl, {
                    delay: 4000 // Set delay to 2000 milliseconds (2 seconds)
                });
                toast.show();
            }
        });
    </script>
</x-app-layout>



