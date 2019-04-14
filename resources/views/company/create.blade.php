@extends('layout.layout')

@section('content')
<div class="container">   
<h1>This is companies create page</h1>
    <form action="/company" method="POST" class="">
        @csrf
        <div class="form-group">
            <input class="form-control " type="text" name="name" id="" placeholder="Company name">
        </div>
        <div class="form-group">
                <input class="form-control " type="text" name="type" id="" placeholder="Company type">
        </div>
        <div class="form-group">
                <input class="form-control " type="text" name="email" id="" placeholder="Email Address"> 
        </div>
        <div class="form-group">
                <input class="form-control " type="text" name="website" id="" placeholder="Website">    
        </div>
        <div class="form-group">
                <input class="form-control " type="text" name="taxAdmin" id="" placeholder="taxAdmin">    
        </div>
        <div class="form-group">
                <input class="form-control " type="text" name="taxNumber" id="" placeholder="taxNumber">    
        </div>
        <div class="form-group">
                <input class="form-control " type="text" name="address" id="" placeholder="Address">
        </div> 
        <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>   
                

        
@endsection