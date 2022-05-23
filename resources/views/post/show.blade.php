{{-- @include('layouts.public')
@section('content') --}}
<!DOCTYPE html>
<body>
<th>{{$post->title}}</th>
<th><img src="{{asset('storage/'.$post->image)}}" height="30px" width="30px"/></th>
<th>{{$post->category->name}}</th>
{!!$post->content!!}
</body>
</html>

