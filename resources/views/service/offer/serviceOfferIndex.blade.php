@extends('...layout.layout')
{{-- {{dd($id)}}  --}}
@section('content')
<div class="container">
 <h1>This is index</h1>
 <a href="/service/offer/create/{{$id}}" class="btn btn-primary">Make a proposal</a>
 <ul>
@foreach ($offer as $offer)
    <li>
        {{$offer->referance}} 
        
        <a href="/service/offer/{{$offer->id}}" class="btn btn-primary">show a proposal</a>
    </li>
@endforeach
</ul>


</div>
@endsection    