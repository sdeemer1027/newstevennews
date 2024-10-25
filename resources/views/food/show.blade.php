@section('title', $recipes->name)

@section('meta')
    <meta property="og:title" content="{{ $recipes->name }}" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($recipes->text), 100) }}" />
    <meta property="og:image" content="{{ Storage::url($recipes->picture_url) }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />
@endsection

<x-app-layout>


    <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg bg-black text-white">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
                Food
            </h2>
        </x-slot>

        <div class="py-3 bg-gray-700">

            <div class="w-full mx-auto px-3 ">
                <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg bg-black">
                    <div class="p-6 text-white dark:text-white">
                        <a href="{{route('home')}}">Home</a> -> Food Catalog
                        <div class="container-fluid my-3">
                            <div class="row">
                                <div class="col-md-3">
                                    @foreach($foodcategory as $fcategory)
                                        <li><a href="{{route('food.bycategory' ,$fcategory->id)}}">{{$fcategory->name}}</a> [{{ $fcategory->recipes_count }}]</li>
                                    @endforeach
                                </div>
                                <div class="col-md-9">
                                @if($recipes && $recipes->id)
                                    <!-- If $recipes exists and has an ID, show the Edit link -->
                                        @if(Auth::id() === 1)
                                        <a href="{{ route('food.menu.edit', $recipes->id) }}">Edit</a>
                                        @endif

                                    <style>
                                        .mymeal ul {
                                            list-style-type: disc;
                                            padding-left: 20px; /* Ensures bullets are indented */
                                        }

                                        .mymeal ol {
                                            list-style-type: decimal;
                                            padding-left: 20px; /* Ensures numbers are indented */
                                        }

                                        .mymeal li {
                                            margin-bottom: 5px; /* Space between list items */
                                        }
                                        .mymeal h2 {
                                            font-size: 1.5em;
                                            color: #ffffff; /* Dark gray for better readability */
                                            margin-top: 20px;
                                            margin-bottom: 10px;
                                            font-weight: bold;
                                        }

                                        .mymeal h3 {
                                            font-size: 1.25em;
                                            color: #ffffff; /* Slightly lighter gray */
                                            margin-top: 15px;
                                            margin-bottom: 8px;
                                            font-weight: bold;
                                        }

                                    </style>
                                      <div id="meal" class="mymeal">
                                          <h2>{{$recipes->food->name}}</h2>
                                          <!-- Display the current image if it exists  550px-->
                                          @if($recipes->picture_url)
                                              <div>
                                                  <img src="{{ Storage::url($recipes->picture_url) }}" alt="Current Image" style="max-width:;100%">
                                              </div>
                                          @endif

                                          {{--$recipes->food->name--}}
                                          <BR><BR>
                                              {!! $recipes->text !!} <hr>
                                              {!! $recipes->ingredients !!}<HR>
                                              {!! $recipes->directions !!}<HR>
                                    </div>

{{--$recipes--}}

                                @else
{{$foodname->name}}<BR>
                                    <!-- If $recipes is null or doesn't have an ID, show the Create link -->
                                        <a href="{{ route('food.menu.create',$foodname->id) }}">Create</a>
                                    @endif

                                    <div>
                                        <h3>{{ $recipes->name }}</h3>
                                        <p>Average Rating: {{ round($recipes->averageRating(), 1) }} / 5</p>
                                        <!-- Display the rating count -->
                                        {{--    <p>{{ $recipes->ratings_count }} people have rated this recipe</p>
                                        {{$recipes}} --}}


                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                           target="_blank"
                                           class="btn btn-primary">
                                            Share on Facebook
                                        </a>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($recipes->name) }}&summary={{ urlencode(Str::limit(strip_tags($recipes->text), 100)) }}" target="_blank" class="btn btn-primary">
                                            Share on LinkedIn
                                        </a>

                                        {{--

                                                                                <h3>Comments</h3>

                                                                                @foreach ($recipes->comments as $comment)
                                                                                    <div class="comment">
                                                                                        <strong>{{ $comment->user->name }}</strong>
                                                                                    <p>{{ $comment->body }}</p>
                                                                                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                                                                                    </div>
                                                                                @endforeach
                                        {{--
                                                                                @auth

                                                                                    <form action="{{ route('recipes.comment', $recipes->id) }}" method="POST">
                                                                                        @csrf
                                                                                        <div>
                                                                                            <label for="body">Add a Comment:</label>
                                                                                            <textarea name="body" id="body" rows="3" required></textarea>
                                                                                        </div>
                                                                                        <button type="submit">Post Comment</button>
                                                                                    </form>

                                                                                @else
                                                                                    <p><a href="{{ route('login') }}">Log in</a> to add a comment.</p>
                                                                                @endauth
                                        --}}


                                    </div>
<style>
    /* Container styling */
    .star-rating {
        display: inline-block;
        cursor: pointer;
        font-size: 2rem;
    }

    /* Default (unfilled) stars */
    .star {
        color: #ccc; /* Light grey */
    }

    /* Hover effect: only stars up to the hovered one change color */
    .star:hover,
    .star.hovered {
        color: orange; /* Orange color on hover */
    }

    /* Selected stars: only stars up to the clicked one stay orange */
    .star.selected {
        color: orange; /* Orange when selected */
    }


</style>
                                    @if(Auth::check())
                                        <form action="{{ route('recipes.rate', $recipes->id) }}" method="POST" id="ratingForm">
                                            @csrf
                                            <div class="star-rating">
                                                <input type="hidden" name="rating" id="ratingInput">

                                                <!-- Create clickable stars -->
                                                <span class="star" data-value="1">&#9734;</span>
                                                <span class="star" data-value="2">&#9734;</span>
                                                <span class="star" data-value="3">&#9734;</span>
                                                <span class="star" data-value="4">&#9734;</span>
                                                <span class="star" data-value="5">&#9734;</span>
                                            </div>
                                            <button type="submit" class="submit-button">Submit Rating</button>
                                        </form>
                                    @endif


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
                    delay: 3000 // Set delay to 2000 milliseconds (2 seconds)
                });
                toast.show();
            }
        });


        document.addEventListener('DOMContentLoaded', function () {
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('ratingInput');

            stars.forEach((star, index) => {
                // Hover: Highlight stars up to the hovered one
                star.addEventListener('mouseover', () => {
                    stars.forEach((s, i) => {
                        s.classList.toggle('hovered', i <= index);
                    });
                });

                // Remove hover effect when mouse leaves the star
                star.addEventListener('mouseout', () => {
                    stars.forEach(s => s.classList.remove('hovered'));
                });

                // Click: Set rating and apply selected class
                star.addEventListener('click', () => {
                    const ratingValue = index + 1;
                    ratingInput.value = ratingValue;

                    // Mark only stars up to the clicked one as selected
                    stars.forEach((s, i) => {
                        s.classList.toggle('selected', i < ratingValue);
                    });
                });
            });
        });


    </script>


</x-app-layout>

