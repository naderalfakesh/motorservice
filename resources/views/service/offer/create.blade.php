@extends('../layout.layout')

@section('content')
    <div class="container">
        <h1>Create an offer</h1>
        <form action="/service/offer" method="POST">
            @csrf
        <input type="hidden" name="service_id" value="{{$service->id}}">
            <div class="card card-body">
                <div class="row">
                    <div class="col-8">
                        
                        @foreach ($service->product as $product)
                            <b>{{$product->type}} :</b>    
                            @php $attribute=json_decode($product->specifics,true); @endphp
                            @foreach ($attribute as $attribute)
                                {{$attribute}} ,
                            @endforeach     
                        @endforeach
                        
                    </div>
                    <div class="col-4 form-inline">
                        <label for="offerDate">Date : </label>
                        <input type="date" name="offerDate" id="" value="{{date('Y-m-d')}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="company">Company:</label>
                        <select name="company" id="company" class="form-control">
                                @foreach ($service->company('')->get() as $company)
                                    <optgroup label="{{$company->name}}">
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                    @if ($company->contact)
                                    @foreach ($company->contact as $contact)
                                        
                                    @endforeach
                                    <option value="{{$contact->id}}">{{$contact->name}}</option>
                                    @endif

                                @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                         
                    </div>
                    <div class="col-4">
                        <label for="referance">Referance</label>
                        <input type="text" name="referance" class="form-control">
                    </div>

                </div>
            
            </div>

            <div class="card card-body mt-2">
                <div class="row">
                    <div class="col-2">
                        <label for="mat">Material NO</label>
                        <input type="text" name="item[0][mat]" class="form-control">
                    </div>
                    <div class="col-4">
                        <label for="description">Description</label>
                        <input type="text" name="item[0][description]" class="form-control">
                    </div>
                    <div class="col">
                        <label for="unitPrice">Unit Price</label>
                        <input type="text" name="item[0][unitPrice]" class="form-control">
                    </div>
                    <div class="col-1">
                        <label for="qty">QTY</label>
                        <input type="text" name="item[0][qty]" class="form-control">
                    </div>
                    <div class="col">
                        <label for="subTotal">Subtotal</label>
                        <input type="text" name="item[0][subTotal]" class="form-control">
                    </div>
                    <div class="col">
                        <label for="tax">Tax %</label>
                        <input type="text" name="item[0][tax]" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label for="mat">Material NO</label>
                        <input type="text" name="item[1][mat]" class="form-control">
                    </div>
                    <div class="col-4">
                        <label for="description">Description</label>
                        <input type="text" name="item[1][description]" class="form-control">
                    </div>
                    <div class="col">
                        <label for="unitPrice">Unit Price</label>
                        <input type="text" name="item[1][unitPrice]" class="form-control">
                    </div>
                    <div class="col-1">
                        <label for="qty">QTY</label>
                        <input type="text" name="item[1][qty]" class="form-control">
                    </div>
                    <div class="col">
                        <label for="subTotal">Subtotal</label>
                        <input type="text" name="item[1][subTotal]" class="form-control">
                    </div>
                    <div class="col">
                        <label for="tax">Tax %</label>
                        <input type="text" name="item[1][tax]" class="form-control">
                    </div>
                </div>



                <div class="row mt-4">
                    <div class="col-8">
                        <h5>Total -----------------------------------------</h5>
                    </div>
                    <div class="col-4">
                        <h5>Euro + KDV</h5>
                    </div>
                </div>
            </div>

            <div class="card card-body mt-2">
                <div class="row mb-2">
                    <div class="col-3 pt-1"><label for="deliveryTerms">Delivery terms : </label></div>
                    <div class="col-6"><input type="text" class="form-control" id="deliveryTerms" name="deliveryTerms"></div>
                </div>
                <div class="row mb-2">    
                    <div class="col-3 pt-1"><label for="deliveryTime">Delivery time : </label></div>
                    <div class="col-6"><input type="text" class="form-control" id="deliveryTime" name="deliveryTime"></div>
                </div>
                <div class="row mb-2">    
                    <div class="col-3 pt-1"><label for="paymentType">Payment type : </label></div>
                    <div class="col-6"><input type="text" class="form-control" id="paymentType" name="paymentType"></div>
                </div>
                <div class="row mb-2">    
                    <div class="col-3 pt-1"><label for="validTime">Offer valid time : </label></div>
                    <div class="col-6"><input type="text" class="form-control" id="validTime" name="validTime"></div>
                </div>
                <div class="row mb-2">    
                    <div class="col-3 pt-1"><label for="commercialTerms">Commercial Terms : </label></div>
                    <div class="col-6"><input type="text" class="form-control" id="commercialTerms" name="commercialTerms"></div>
                </div>
            </div>

            <div class="card card-body d-flex flex-row justify-content-center mt-2">
                <input type="submit" value="submit" class="btn btn-primary">

            </div>




        </form>
    </div>
@endsection