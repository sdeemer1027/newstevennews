<x-app-layout>

    <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg bg-black text-white">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
                Food
            </h2>
        </x-slot>

        <div class="py-3 bg-gray-700">
{{--$recipe--}}
            <div class="w-full mx-auto px-3 ">
                <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg bg-black">
                    <div class="p-6 text-white dark:text-white">
                        <a href="{{route('home')}}">Home</a> ->
                        @if(isset($currentCategory))
                            <a href="{{ route('food.index') }}">Food Catalog</a> ->
                            {{ $currentCategory->name }}
                        @else
                            Food Catalog
                        @endif
                        
                        <div class="container-fluid my-3">
                            <div class="row">
                                <div class="col-md-3">
                                    @foreach($foodcategory as $fcategory)
                                        <li><a href="{{route('food.bycategory' ,$fcategory->id)}}">{{$fcategory->name}}</a></li>
                                    @endforeach
                                </div>
                                <div class="col-md-9">
                                    <div id="meal">
                                        <style>
                                            /* Set the table background and text color */
                                            #myTable {
                                                background-color: black;
                                                color: white;
                                                width: 100%;
                                            }
                                            /* Add bottom border to each row for separation */
                                            #myTable tr {
                                                border-bottom: 1px solid #555; /* Light gray border */
                                            }
                                            /* Make header text white */
                                            #myTable th {
                                                color: white;
                                            }
                                            /* Set cell padding for readability */
                                            #myTable td, #myTable th {
                                                padding: 10px;
                                            }
                                        </style>

                                        <table id="myTable" ><!--class="table table-striped" -->
                                            <tr class="bg-black">
                                                <th></th>
                                                <th>Title</th>
                                                <th>Category</th>
                                            </tr>

                                        @foreach($recipes as $meal)
                                            <tr  class="bg-black">
                                                <td>
                                                    @foreach ($meal->recipes as $recipe)
                                                        @if(!empty($recipe->picture_url))
                                                            <div class="recipe-text">
                                                                <img src="{{ Storage::url($recipe->picture_url) }}" alt="Current Image" style="max-width:75px;">
                                                            </div>
                                                        @endif

                                                    @endforeach


                                                </td>
                                                <td><a href="{{route('food.menu',$meal->id)}}">{{$meal->name}}
                                                    @foreach ($meal->recipes as $recipe)
                                                        @if(!empty($recipe->text))
                                                            <div class="recipe-text">
                                                                {!! Str::limit(strip_tags($recipe->text), 100, ' <span style="color:green;">...more...</span>') !!}
                                                            </div>
                                                        @endif

                                                    @endforeach

                                                    </a>




                                                </td><td>{{$meal->category->name}}</td>

                                            </tr>
                                        @endforeach
                                        </table>

                                    </div>

{{--$recipes--}}
{{--$meal--}}
                                </div>
                                <style>
                                    /* Full-width pagination container with gray-800 background */
                                    .pagination-links nav {
                                        background-color: #2d3748; /* gray-800 */
                                        width: 100%; /* Full width */
                                        padding: 10px;
                                        border-radius: 5px;
                                        text-align: center; /* Center align pagination links */
                                    }

                                    /* Styling for individual pagination links with gray text */
                                    .pagination-links .pagination .page-item .page-link {
                                        color: #4a5568; /* gray-700 text */
                                        background-color: #2d3748; /* gray-800 background */
                                        border-color: #4a5568; /* gray-700 border */
                                        margin: 0 5px; /* Space between links */
                                    }

                                    /* Hover effect for pagination links */
                                    .pagination-links .pagination .page-item .page-link:hover {
                                        background-color: #4a5568; /* gray-700 on hover */
                                        border-color: #2d3748; /* gray-800 border */
                                    }

                                    /* Active page styling */
                                    .pagination-links .pagination .page-item.active .page-link {
                                        background-color: #4a5568; /* gray-700 */
                                        color: white; /* White text for active link */
                                        border-color: #4a5568; /* gray-700 */
                                    }
                                </style>

                                <div class="pagination-links">
                                    {{ $recipes->links() }}
                                </div>
                                {{-- $recipes->links() --}}
                                {{--$foodcategory--}}
                                <HR>
                                {{--$recipe--}}
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

