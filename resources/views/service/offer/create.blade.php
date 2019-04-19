@extends('../layout.layout')

@section('content')
    <div class="container">
        <h1>Create an offer</h1>
        
        <div class="card card-body">
            <ul>
                @foreach ($company as $company)
                <li>
                    <input type="radio" name="company[]" id="" value="{{$company->id}}">
                     {{$company->name}} <br> {{$company->companyAddress()->first()}}
                    <ul>
                        
                         @foreach ($company->contact as $contact)
                            <li>
                                <input type="radio" name="contact[]" id="" value="{{$contact->id}}"> 
                                {{$contact->name}}  
                            </li>  
                         @endforeach   
                        
                    </ul>
                </li>     
                @endforeach
            </ul> 
        </div>

        <div class="card card-body">
            <input type="text" name="reference" class="">
        </div>

        {{-- items --}}

        






    </div>
@endsection