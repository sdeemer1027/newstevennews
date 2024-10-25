<x-app-layout>
    <script src="/js/tinymce/tinymce.min.js"></script>
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
            @foreach($categories as $category)

            @endforeach
            <form action="{{ route('blogs.store', 'hold') }}" method="POST">
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
                    <label for="categories" class="form-label">Categories</label>
                    <select class="form-select" id="categories" name="categories[]"  required>
                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="content">Blog Content:</label>
                    <textarea class="form-control tinymce-editor" id="content" name="content" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Create Blog</button>
            </form>
        </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            tinymce.init({

                selector: 'textarea.tinymce-editor',
                plugins: 'code',
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | code',
                height: 400
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#title').on('input', function() {
                var title = $(this).val();
                var slug = title.toLowerCase()
                    .replace(/[^a-z0-9\s]/g, '') // Remove special characters
                    .replace(/\s+/g, '_');       // Replace spaces with underscores

                $('#slug').val(slug);
            });
        });

    </script>
</x-app-layout>
