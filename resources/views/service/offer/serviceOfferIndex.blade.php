@extends('...layout.layout')

@section('content')
    <div class="container">
        <h1>This is index</h1>
        <div>
            <a href="/service/offer/create/{{$id}}" class="btn btn-primary">Make a proposal</a>
            <a href="#" class="btn btn-primary">Create an invoice</a>
        </div>

        <div class="mt-2">
            <table class="table table-striped ">
                <thead>
                    <th>#</th>
                    <th>Product</th>
                    <th>Company</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>     
                <tbody>
                    @foreach ($offer as $offer)
                    <tr>
                        <td><a class="" href="/service/offer/{{$offer->id}}">{{$offer->referance}}</a></td>
                        <td>{{$offer->service->product->first()->type}}</td>
                        <td>{{$offer->company->name}}</td>
                        <td>{{$offer->total}}</td>
                        <td>{{$offer->created_at}}</td>
                        <td>add status</td>
                        <td><a href="/service/offer/{{$offer->id}}/edit" class="btn btn-primary">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>   

        </div>
        

    </div>
@endsection    