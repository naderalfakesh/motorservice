@extends('layout.layout')

@section('content')

<div class="container">
    <h1>This is services show page</h1>
    <hr>


    {{-- fetching the associated pictures  --}}
    @if ($service->picture->count())
        <ul>
            @foreach ($service->picture as $picture)
                <li>{{$picture->url}}</li>
            @endforeach
        </ul>
    @endif


    {{-- fetching the requesting companies --}}
    @if ($service->company('requestingCompany')->count())
        @foreach ($service->company('requestingCompany')->get() as $requestingCompany)
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{$requestingCompany->name}}</h2>
                    <p class="card-text">
                        Address: {{$requestingCompany->companyAddress->first()}}<br>
                        Telefon: {{$requestingCompany->phone}}<br>
                        Email: {{$requestingCompany->email}}<br>
                        Website: {{$requestingCompany->website}}<br>
                        VD: {{$requestingCompany->taxAdmin}}<br>
                        VN: {{$requestingCompany->taxNumber}} <br>
                        @foreach ($service->contact('enduser')->get() as $contact)
                        Person in contact :  {{$contact->name}}
                        @endforeach


                    </p>
                </div>
            </div>
        @endforeach
    @endif

    {{-- fetching the products details --}}
    @if ($service->product->count())
        @foreach ($service->product as $product)
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{$product->type}}</h2>
                    <p class="card-text">
                        @foreach (json_decode($product->specifics,true) as $attribute => $val)
                        <b>{{$attribute}}</b>: {{$val}} <br>
                        @endforeach
                    </p>
                </div>
            </div>
        @endforeach
    @endif


    {{-- Filure details --}}
    @if ($service->failureDescription)
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Failure Details</h2>
                <p class="card-test">
                    {{$service->failureDescription}}
                </p>
            </div>
        </div>
    @endif

    {{-- root cause --}}
    @if ($service->rootCause)
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Root cause</h2>
                <p class="card-test">
                    {{$service->rootCause}}
                </p>
            </div>
        </div>
    @endif

    {{-- Jobs that done --}}
    @if ($service->serviceAction)
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Jobs that done</h2>
                <p class="card-test">
                    {{$service->serviceAction}}
                </p>
            </div>
        </div>
    @endif

    {{-- Warranty case --}}
    @if ($service->warrantyStatus)
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Warranty status</h2>
                <p class="card-test">
                   Warranty status:  {{$service->warrantyStatus}} <br>
                   Warranty Ge Number:  {{$service->warrantyGENumber ? $service->warrantyGENumber : 'None'}} <br>
                   Warranty accepted date:  {{$service->WarrantyAcceptingDate ? date('d-m-Y', strtotime($service->WarrantyAcceptingDate)) : 'None'}} <br>
                   @foreach ($service->contact('warrantygiver')->get() as $contact)
                        Warranty giver person:  {{$contact->name}}
                    @endforeach
                </p>
            </div>
        </div>
    @endif





</div>

@endsection
