@extends('thema')

@section('content')
@if (Session::get('success'))
<script>
    tori.notification("{{ Session::get('success') }}", {
        type: "success",
        duration: 5000
    });
</script>
@endif
@if ($errors->any())
@foreach ($errors->all() as $error)
<script>
tori.notification("{{$error}}", {
type: "error",
duration: 5000
});
</script>
@endforeach
@endif
<section class="product-form">
<form action="{{route('addProduct')}}" method="POST">
    @csrf
    <input  type="text" name="name">
    <button type="submit"><i class="uil uil-plus"></i></button>
</form>
</section>

@endsection