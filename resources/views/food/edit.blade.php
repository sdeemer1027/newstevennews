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

                                <div class="col-md-12">
                                    <div id="meal">

                                        <!-- Edit Blog Form -->
                                        <form action="{{ route('food.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <!-- Display the current image if it exists -->
                                            @if($menu->picture_url)
                                                <div>
                                                    <img src="{{ Storage::url($menu->picture_url) }}" alt="Current Image" style="max-width: 150px;">
                                                </div>
                                        @endif

                                        <!-- File input to upload new picture -->
                                            <div>
                                                <label for="picture">Upload a new picture:</label>
                                                <input type="file" name="picture" id="picture">
                                            </div>

                                            <!-- Slug -->
                                            <div class="mb-3">
                                                <label for="slug" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $menu->food->name) }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Category:</label>
                                                <select name="category" id="category" class="form-control">
                                                    <option value=""></option>
                                                    @foreach($foodcategory as $fcategory)
                                                        <option value="{{$fcategory->id}}"
                                                            {{ ($menu->food->foodcategory_id == $fcategory->id) ? 'selected' : '' }}>
                                                            {{$fcategory->name}}</option>
                                                        @endforeach
                                                </select>

                                            </div>
                                            <!-- Content -->
                                            <div class="mb-3">
                                                <label for="content" class="form-label">Content</label>
                                                <textarea class="form-control" id="content" name="text" rows="6" required>{{ old('content', $menu->text) }}</textarea>
                                            </div>
                                            <!-- ingredients -->
                                            <div class="mb-3">
                                                <label for="ingredients" class="form-label">ingredients</label>
                                                <textarea class="form-control" id="ingredients" name="ingredients" rows="6" required>{{ old('content', $menu->ingredients) }}</textarea>
                                            </div>
                                            <!-- directions -->
                                            <div class="mb-3">
                                                <label for="directions" class="form-label">directions</label>
                                                <textarea class="form-control" id="directions" name="directions" rows="6" required>{{ old('content', $menu->directions) }}</textarea>
                                            </div>
                                            <!-- Submit Button -->
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
{{$menu}}

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

