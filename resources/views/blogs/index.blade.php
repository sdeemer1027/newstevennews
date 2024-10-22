<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Blogs
        </h2>
    </x-slot>

    <div class="py-3">

        <div class="w-full mx-auto px-4">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white dark:text-white">
                    <a href="{{route('home')}}">Home</a> -> Blogs
                    <div class="container-fluid my-5">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="about-me">
                                    <button id="dark-mode-toggle" onclick="toggleDarkMode()" class="btn btn-primary">Toggle Dark Mode</button>
                                    <h3>Categories</h3>
                                    @include('blogs.categorylist')
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog-list">
                                    <h3>Latest Blogs</h3>
                                    <!-- Blog links will go here -->
                                    {{--$blogs--}}
                                    <div class="card">
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

        <script>
            function toggleDarkMode() {
                const body = document.body;
                body.classList.toggle('dark-mode');

                // Save the preference using AJAX
                const isDarkMode = body.classList.contains('dark-mode');
                fetch('/toggle-dark-mode', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        dark_mode: isDarkMode
                    })
                });
            }
        </script>

    </div>
</x-app-layout>



