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
                                        <li><a href="{{route('food.bycategory' ,$fcategory->id)}}">{{$fcategory->name}}</a></li>
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
                                          <!-- Display the current image if it exists  550px-->
                                          @if($recipes->picture_url)
                                              <div>
                                                  <img src="{{ Storage::url($recipes->picture_url) }}" alt="Current Image" style="max-width:;100%">
                                              </div>
                                          @endif

                                          {{$recipes->food->name}}
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
    </script>


</x-app-layout>

