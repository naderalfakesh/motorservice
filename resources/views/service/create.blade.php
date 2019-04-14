@extends('layout.layout')
@section('content')

<div class="container">
<h1>Create page</h1>
<form action="/service" method="POST" >
    @csrf
    <div class="form-group col-3">
        <input type="number" name="enduserId" class="form-control" placeholder="enduserId">
    </div>
    <div class="form-group col-3">
        <textarea name="failureDescription" class="form-control" cols="30" rows="10">failureDescription</textarea>
    </div>
    <div class="form-group col-3"> 
        <textarea name="rootCause" class="form-control" cols="30" rows="10">rootCause</textarea>
    </div>
    <div class="form-group col-3">
        <textarea name="warrantyStatus" class="form-control" cols="30" rows="10">warrantyStatus</textarea>
    </div>
    <div class="form-group col-3">
        <input type="text" name="warrantyGENumber" class="form-control" placeholder="warrantyGENumber">
    </div>
    <div class="form-group col-3">
        <input type="date" name="WarrantyAcceptingDate" class="form-control" placeholder="WarrantyAcceptingDate">
    </div>
    <div class="form-group col-3">
        <input type="number" name="personInContactId" class="form-control" placeholder="personInContactId">
    </div>
    <div class="form-group col-3">
        <input type="number" name="warrantyGiverPersonId" class="form-control" placeholder="warrantyGiverPersonId">
    </div>
    <div class="form-group col-3">
        <textarea name="serviceAction" class="form-control" cols="30" rows="10">serviceAction</textarea>
    </div>
    <div class="form-group col-3">
        <input type="number" name="costAmount" class="form-control" placeholder="costAmount">
    </div>
    <div class="form-group col-3">
        <input type="text" name="costCurrency" class="form-control" placeholder="costCurrency">
    </div>
    <div class="form-group col-3">
        <input type="number" name="taxAmount" class="form-control" placeholder="taxAmount">
    </div>
    <div class="form-group col-3">
        <input type="text" name="bankBranch" class="form-control" placeholder="bankBranch">
    </div>
    <div class="form-group col-3">
        <input type="text" name="personalIds" class="form-control" placeholder="personalIds">
    </div>
    <div class="form-group col-3">
        <input type="text" name="activePictursIds" class="form-control" placeholder="activePictursIds">
    </div>

    <div class="form-group col-3">
        <button type="submit"  class="btn btn-primary" >submit</button>
    </div>



</form>



</div>
    
@endsection