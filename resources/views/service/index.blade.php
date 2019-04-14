@extends('layout.layout')

@section('content')
<div class="container">
    <h1>This is index page</h1>
    <div class="d-flex m-2">
        <a class="btn btn-primary" href="/service/create">Create Service</a>
    </div>

    @if ($service->count())
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Ref#</th>
                <th scope="col">Company name</th>
                <th scope="col">Product</th>
                <th scope="col">rootCause</th>
                <th scope="col">warrantyStatus</th>

            </tr>
            </thead>
            <tbody>
                @foreach ($service as $service)

                        <tr>
                        <th scope="row">{{$service->id}}</th>
                        <td><a href="/service/{{$service->id}}">  {{$service->company('requestingCompany')->count() ? $service->company('requestingCompany')->first()->name : 'Unknown' }}  </a></td>
                        <td>{{$service->product->count() ? $service->product->first()->type : 'not exist'}}</td>
                        <td>{{$service->rootCause}}</td>
                        <td>{{$service->warrantyStatus}}</td>
                        </tr>

                @endforeach
            </tbody>
        </table>

        @else
            <div><h3>There is no services</h3></div>
        @endif



</div>

@endsection
