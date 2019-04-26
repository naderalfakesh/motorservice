@extends('../layout.layout')
{{-- {{dd($order)}} --}}
@section('content')
<div class="container">
<h1>Service invoice index</h1>
    
    <table class="table">
        <thead>
            <th>Action</th>
            <th>service_id</th>
            <th>company_id</th>
            <th>contact_id</th>
            <th>authorizedPersonId</th>
            <th>referance</th>
            <th>total</th>
            <th>totalTax</th>
            <th>totalCurrency</th>
            <th>deliveryTerms</th>
            <th>deliveryTime</th>
            <th>paymentType</th>
            <th>validTime</th>
            <th>commercialTerms</th>
            <th>status</th>
            <th>created_at</th>
        </thead>
        <tbody>
            @foreach ($order as $order)
            <tr>
            <td>
                <a href="/service/order/{{$order->id}}" class="btn btn-outline-dark btn-sm">O</a>
                <a href="/service/order/{{$order->id}}" class="btn btn-outline-dark btn-sm">X</a>
                <a href="/service/order/{{$order->id}}/edit" class="btn btn-outline-dark btn-sm">E</a>
            </td>
            <td>{{$order->service_id}}</td>
            <td>{{$order->company_id}}</td>
            <td>{{$order->contact_id}}</td>
            <td>{{$order->authorizedPersonId}}</td>
            <td>{{$order->referance}}</td>
            <td>{{$order->total}}</td>
            <td>{{$order->totalTax}}</td>
            <td>{{$order->totalCurrency}}</td>
            <td>{{$order->deliveryTerms}}</td>
            <td>{{$order->deliveryTime}}</td>
            <td>{{$order->paymentType}}</td>
            <td>{{$order->validTime}}</td>
            <td>{{$order->commercialTerms}}</td>
            <td>{{$order->status}}</td>
            <td>{{$order->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection