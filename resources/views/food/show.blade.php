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
                                        <a href="{{ route('food.menu.edit', $recipes->id) }}">Edit</a>

                                      <div id="meal">
                                          <!-- Display the current image if it exists -->
                                          @if($recipes->picture_url)
                                              <div>
                                                  <img src="{{ Storage::url($recipes->picture_url) }}" alt="Current Image" style="max-width: 150px;">
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

