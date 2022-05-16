<div >
    @foreach ($product as $item)
        <p>name: {{$item->name}} price: {{$item->price}}</p>
    @endforeach
</div>