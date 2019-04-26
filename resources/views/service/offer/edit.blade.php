@extends('...layout.layout')
{{-- {{dd( )}}  --}}
@section('content')
<div class="container ">
    <h1 class="text-center">Edit Service Offer</h1>
    <a href="/service/offer/index/{{$offer->service->id}}" class="btn btn-dark">Back</a>
<form action="/service/offer/{{$offer->id}}" method="POST">
@csrf
@method('PATCH')

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
                <strong>Date :</strong> <input type="date" name="offer[created_at]" id="" class="form-control" value="{{\Carbon\Carbon::parse($offer->created_at)->format('Y-m-d')}}"> <br>
            </div>
        </div>
    </div>
    <div class="card card-body mb-2">
        <div class="row">
            <div class="col-8">
                    <strong> Company:</strong>
                <select name="offer[company_id]" id="" class="form-control">
                    @foreach ($offer->service->company('')->get() as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-4">
            <strong> To:</strong> 
            <select name="offer[authorizedPersonId]" id="" class="form-control">
                @foreach (App\contact::all() as $contact)
                    <option value="{{$contact->id}}" {{$offer->authorizedPerson->id == $contact->id ? 'selected' : '' }} > {{$contact->name}} </option>
                @endforeach
            </select>
            <br>
            
            <strong> Referance:</strong> <input type="text" name="offer[referance]" id="" class="form-control" value="{{$offer->referance}}">  <br>
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
            <input type="hidden" name="itemId[{{$loop->iteration}}]" value="{{$item->id}}">
        <div class="row mb-1">
            <div class="col">
                {{$loop->iteration}}
            </div>
            <div class="col-2">
                <input type="text" name="item[{{$loop->iteration}}][productCode]" id="" class="form-control" value="{{$item->productCode}}">
            </div>
                <div class="col-4">
                <input type="text" name="item[{{$loop->iteration}}][description]" id="" class="form-control" value="{{$item->description}}">
                </div>
                <div class="col">
                <input type="text" name="item[{{$loop->iteration}}][unitPrice]" id="" class="form-control" value="{{$item->unitPrice}}">
                </div>
                <div class="col-1">
                <input type="text" name="item[{{$loop->iteration}}][amount]" id="" class="form-control" value="{{$item->amount}}">
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
                <input type="text" name="offer[deliveryTerms]" id="" class="form-control" value="{{$offer->deliveryTerms}}"> 
                <input type="text" name="offer[deliveryTime]" id="" class="form-control" value="{{$offer->deliveryTime}}"> 
                <input type="text" name="offer[paymentType]" id="" class="form-control" value="{{$offer->paymentType}}"> 
                <input type="text" name="offer[validTime]" id="" class="form-control" value="{{$offer->validTime}}"> 
                <input type="text" name="offer[commercialTerms]" id="" class="form-control" value="{{$offer->commercialTerms}}"> 
            </div>
        </div>
        <div class="row ">
                <p class="font-weight-bold">Authorized Person</p> 
                <select name="personalId" id="" class="form-control">
                    @foreach (App\contact::all() as $contact)
                    <option value="{{$contact->id}}" {{$offer->authorizedPerson->id == $contact->id ? 'selected' : '' }} >{{$contact->name}}</option>
                    @endforeach
                </select>
        </div>
    </div>
    
    
    
    <div class="card card-body  mb-2 d-flex flex-row justify-content-center">
        <input type="submit" value="Submit" class="btn btn-primary">
    </div>
</form>

</div>

@endsection