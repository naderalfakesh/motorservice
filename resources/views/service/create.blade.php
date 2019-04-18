@extends('layout.layout')
@section('content')

<div class="container">
    <h1>Create page</h1>
    <form action="/service" method="POST" enctype="multipart/form-data" >
        @csrf

        @php
            $productAttributes=json_decode(Storage::disk('local')->get('json/productAttributes.json'),true );
        @endphp
        
        <div class="row form-group">
        @foreach ($productAttributes['motor'] as $key => $value)
            <div class="col">
                <label for="{{$key}}">{{$key}}</label>
                <input type="text" name="motor[{{$key}}]" class="form-control" id="{{$key}}" >
            </div>
            @endforeach
        </div>

        <div class="row form-group">
            <div class="col">
                <label for="company">Company</label>
                <select name="company" class="form-control" id="">
                    @foreach ($company as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="personincontact">Person in contact</label>
                <select name="personincontact" class="form-control" id="">
                    @foreach ($contact as $contact)
                    <option value="{{$contact->id}}">{{$contact->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col">
                <label for="failureDescription">failureDescription</label>
                <textarea name="failureDescription" class="form-control"  rows="3"></textarea>
            </div>
            <div class="col"> 
                <label for="rootCause">rootCause</label>
                <textarea name="rootCause" class="form-control"  rows="3"></textarea>
            </div>
        </div>
       
        <div class="row form-group">
            <div class="col">
                <label for="warrantyStatus">warrantyStatus</label>
                <textarea name="warrantyStatus" class="form-control"  rows="3"></textarea>
            </div>
            <div class="col">
                <label for="serviceAction">serviceAction</label>
                <textarea name="serviceAction" class="form-control"  rows="3"></textarea>
            </div>
        </div>
        
        <div class="row form-group">
            <div class="col">
                <label for="WarrantyAcceptingDate">WarrantyAcceptingDate</label>
                <input type="date" name="WarrantyAcceptingDate" class="form-control" >
            </div>
            <div class="col">
                <label for="warrantyGENumber">warrantyGENumber</label>
                <input type="text" name="warrantyGENumber" class="form-control" >
            </div>
        </div>


        <div class="row form-group">
            <div class="col">
                <label for="costAmount">costAmount</label>
                <input type="number" name="costAmount" class="form-control" >
            </div>
            <div class="col">
                <label for="costCurrency">costCurrency</label>
                <input type="text" name="costCurrency" class="form-control" >
            </div>
        </div>

        <div class="row form-group">
            <div class="col">
                <label for="taxAmount">taxAmount</label>
                <input type="number" name="taxAmount" class="form-control" >
            </div>
            <div class="col">
                <label for="bankBranch">bankBranch</label>
                <input type="text" name="bankBranch" class="form-control" >
            </div>
        </div>
        
        <div class="row form-group px-5">
            <div class=" custom-file">
                <input type="file" name="activePictursIds[]" class="custom-file-input" id="customFile"  multiple>
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>

        <div class="row form-group px-3">
            
                <button type="submit"  class="btn btn-primary" >submit</button>
            
        </div>

    </form>

</div>
    
@endsection