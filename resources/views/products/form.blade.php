<form method="POST" action={{route('product.store')}}  >
    @csrf
    {{-- <p>{{$msg}}</p> --}}
<input name="name" />
<input name="price"/>
<input type="submit" name="submit" value="submit">
</form>
