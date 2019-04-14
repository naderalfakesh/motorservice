@extends('layout.layout')

@section('content')
    <div class="container">
        <h1>This is companies index page</h1>
        <hr>
        <div class="d-flex m-2">
        <a class="btn btn-primary" href="/company/create">Create company</a>
        </div>
        
        <div class="d-flex">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    <th scope="col">Edit</th>
                </tr>
                </thead>
            @foreach ($company as $company)
                <tbody>
                    <tr>
                    <th scope="row">{{$company->id}}</th>
                    <td><a href="/company/{{$company->id}}"> {{$company->name}}</a></td>
                    <td>{{$company->type}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->website}}</td>
                    <td>
                        <div class="d-inline-flex">
                            <div class="p-2">
                                <a class="btn btn-outline-primary" href="/company/{{$company->id}}/edit">Edit</a> 
                            </div>
                            <div class="p-2">
                                <form action="/company/{{$company->id}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">X</button>
                                </form>
                            </div>
                        </div>

                        
                        
                    </td>                  
                    </tr>
                </tbody>
            @endforeach
                    
            </table>
            
        </div>
        


        

    </div>
@endsection