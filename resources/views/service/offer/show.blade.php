@extends('...layout.layout')
{{-- {{dd($offers)}}  --}}
@section('content')
<div class="container ">
    <h1 class="text-center">Service Offer</h1>
 {{-- needed for pagination --}}
  
 <div class="d-flex">
     <a href="/service/offer/{{$offer->id}}/edit" class="btn btn-primary">edit</a>
     <form action="/service/offer/{{$offer->id}}" method="POST">
         @csrf
         @method('DELETE')
         <input type="submit"  value="Delete" class="btn btn-danger">
    </form>
 </div>


 <div class="card card-body mb-2">
       <div class="row">
            <div class="col-8">
                @foreach ($offer->service->product as $product)
                    <b>{{$product->type}} :</b>    
                    @php $attribute=json_decode($product->specifics,true); @endphp
                    @foreach ($attribute as $attribute)
                        {{$attribute}} ,
                    @endforeach     
                @endforeach
            </div>
            <div class="col-4">
                <strong>Date :</strong> {{\Carbon\Carbon::parse($offer->created_at)->format('d/m/Y')}} <br>
                
            </div>
        </div>
    </div>
    <div class="card card-body mb-2">
        <div class="row">
            <div class="col-8">
                <b> {{$offer->company->name}}</b> <br>
                {{$offer->company->website}}
            </div>
            <div class="col-4">
            <strong> To:</strong> {{$offer->authorizedPerson->name}} <br>
            <strong> Referance:</strong> {{$offer->referance}} <br>
            </div>
        </div>
    </div>
    <div class="card card-body mb-2">
        <div class="row">
            <div class="col">
                <b>#</b>
            </div>
            <div class="col-2">
                <b>Material NO</b>
            </div>
            <div class="col-4">
                <b>Description</b>
            </div>
            <div class="col">
                <b>Unit Price</b>
            </div>
            <div class="col-1">
                <b>QTY</b>
            </div>
            <div class="col">
                <b>Subtotal</b>
            </div>
            <div class="col">
                <b>Tax %</b>
            </div>
        </div>
        <hr>
        @foreach ($offer->item as $item)
        <div class="row">
            <div class="col">
                {{$loop->iteration}}
            </div>
            <div class="col-2">
                {{$item->productCode}}
            </div>
                <div class="col-4">
                    {{$item->description}}
                </div>
                <div class="col">
                    {{$item->unitPrice}}
                </div>
                <div class="col-1">
                    {{$item->amount}}
                </div>
                <div class="col">
                    {{$item->amount * $item->unitPrice}}
                </div>
                <div class="col">
                    {{$item->tax ? $item->tax : $item->amount * $item->unitPrice*0.18}}
                </div>
            </div>
        @endforeach
        <hr>
        <div class="row ">
            <div class="col-8">
                <b>Total</b>
            </div>
            <div class="col-4 ">
                <p class="text-right">{{$offer->item->sum(function($t){return $t->amount * $t->unitPrice;}) }} Euro +KDV</p>
            </div>
        </div>
    </div>
    
    <div class="card card-body mb-2">
        <div class="row">
            <div class="col-4">
                <p class="font-weight-bold">Delivery Terms:</p>
                <p class="font-weight-bold">Delivery Time:</p>
                <p class="font-weight-bold">Payment Type:</p>   
                <p class="font-weight-bold">Offer Valid Period:</p>     
                <p class="font-weight-bold">Commercial terms:</p>   
            </div>
            <div class="col-8">
                <p class="font-weight-normal">{{$offer->deliveryTerms}} </p>
                <p class="font-weight-normal">{{$offer->deliveryTime}} </p>
                <p class="font-weight-normal">{{$offer->paymentType}} </p>
                <p class="font-weight-normal">{{$offer->validTime}} </p>
                <p class="font-weight-normal">{{$offer->commercialTerms}} </p>
            </div>
        </div>
        <div class="row ">
                <p class="font-weight-bold">Authorized Person</p> 
                <p>{{$offer->authorizedPerson->name}}</p>
        </div>
    </div>
    
   
    
</div>

@endsection