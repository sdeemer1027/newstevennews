<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create a New Blog
        </h2>
    </x-slot>

    <div class="py-2">

        <div class="container  bg-gray-400">

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('blogs.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Blog Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="slug">Blog Slug:</label>
                    <input type="text" class="form-control" id="slug" name="slug" required>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category" id="category" class="form-control">
                        <option value=""></option>
                        <option value="Laravel">Laravel</option>
                        <option value="PHP">PHP</option>
                        <option value="MySql">MySql</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="content">Blog Content:</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Create Blog</button>
            </form>
        </div>

    </div>
</x-app-layout>
