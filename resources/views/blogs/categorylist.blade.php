<hr>
{{--$categories--}}
@foreach($categories as $category)
    <li><a href="{{route('blogs.byCategory',$category->name)}}">{{ $category->name}}</a></li>

@endforeach
