<div >
    @foreach ($product as $item)
    <ul>
        <li> #{{$loop->iteration}}  name: {{$item->name}} price: {{$item->price}}</li>
    </ul>

    @endforeach

</div>