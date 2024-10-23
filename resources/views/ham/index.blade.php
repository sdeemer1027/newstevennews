<x-app-layout>

    <style>
        .container {
            display: flex;
            height: 100vh;
        }
        .movie-list {
            width: 100%;
            padding: 20px;
            background-color: #000000;
            overflow-y: auto;
        }

        .movie-list ul {
            list-style-type: none;
            padding: 0;
        }

        .movie-list li {
            padding: 10px;
            margin: 5px 0;
            background-color: #000000;
            color: #ffffff; /* White text on black background */
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .movie-list li:hover {
            background-color: #d0d0d0; /* Gray background on hover */
            color: #000000; /* Black text on hover */
        }

        .movie-list li.active {
            background-color: #c0c0c0; /* Light gray for the active/selected item */
            color: #000000; /* Black text when active */
        }
        .video-wrapper {
            width: 100%;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh; /* Ensure the video section takes full height */
        }

        iframe {
            width: 100%;
            height: 60vh; /* Take 90% of the viewport height */
            border: none;
        }
    </style>
    <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg bg-black text-white">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Blogs
            </h2>
        </x-slot>
        <div class="py-3 bg-gray-700">


            <div class="container">


            <div class="w-full mx-auto px-3">
                <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg  bg-black">
                    <div class="p-6 text-white dark:text-white">
                        {{--@include('blogs.crumb.blade.php')--}}
                        <a href="{{route('home')}}">Home</a> -> <a href="{{route('ham.index')}}">Movies</a> ->

                        <div class="container-fluid my-5">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="movie-list">
                                        <h3>Movie Listing</h3>
                                        <ul>
                                            <li data-video="1Wmct61ktBMtqD56uB19BxrQBHNgKEQNc">Hatfield & McCoy Part 1</li>

                                            <li data-video="1J0AvSBQWvROBD_unwEP-4fRN97WHkHp2">Hatfield & McCoy Part 2</li>
                                            <li data-video="1oWsw8a9azcIybsjTvVAHlG5Zyd4WRpuo">Hatfield & McCoy Part 3</li>
                                        </ul>

                                    </div>
                                    <div class="bg-gray-800  p-3">{{$qrCode}}</div>
                                </div>
                                <div class="col-md-9 bg-gray-800 p-1 px-1">


                                        <div class="video-wrapper">
                                            <!-- Iframe to display the movie -->
                                            <iframe id="moviePlayer" src="{{route('ham.intro')}}" allowfullscreen></iframe>
                                        </div>

                                        {{--$blogs--}}
                                    </div>
                                </div>
                            </div>
                        <div class="row">

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
            const movieListItems = document.querySelectorAll('.movie-list li');
            const iframe = document.getElementById('moviePlayer');

            // Add click event to each movie title
            movieListItems.forEach(function (item) {
                item.addEventListener('click', function () {
                    // Get the data-video attribute (the movie's Google Drive file ID)
                    const videoId = this.getAttribute('data-video');

                    // Change the src of the iframe to load the selected movie in preview mode
                    iframe.src = `https://drive.google.com/file/d/${videoId}/preview`;

                    // Remove 'active' class from all list items
                    movieListItems.forEach(function (item) {
                        item.classList.remove('active');
                    });

                    // Add 'active' class to the clicked list item
                    this.classList.add('active');
                });
            });
        });
    </script>

</x-app-layout>



