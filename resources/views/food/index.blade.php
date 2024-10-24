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
                                    <div id="meal">
                                        <table id="myTable" class="display">
                                            <tr class="bg-black">
                                                <th>Title</th>
                                                <th>Category</th>
                                            </tr>

                                        @foreach($recipe as $meal)
                                            <tr  class="bg-black">
                                                <td><a href="{{route('food.menu',$meal->id)}}">{{$meal->name}}</a></td><td>{{$meal->category->name}}</td>
                                            </tr>
                                        @endforeach
                                        </table>
                                    </div>


                                </div>

                                {{--$foodcategory--}}
                                <HR>
                                {{$recipe}}
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

