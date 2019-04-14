@extends('layout.layout')

@section('content')
    <div class="container">
        
        <h1>{{$company->name}}</h1>
        <hr>
        <div class="blog-post">
            <p ><b>Company type: </b>{{$company->type}}</p>
            <p ><b>Company email: </b>{{$company->email}}</p>
            <p ><b>Company website: </b>{{$company->website}}</p>
            <p ><b>Tax administration: </b>{{$company->taxAdmin}}</p>
            <p ><b>Tax Number: </b>{{$company->taxNumber}}</p>
            
            
             @foreach ($company->companyAddress as $address) 
            
            <p ><b>Address {{$loop->iteration}}: </b>{{$address->address}}</p>
                
            @endforeach     
            
        </div>
         
            
        
    </div>
@endsection