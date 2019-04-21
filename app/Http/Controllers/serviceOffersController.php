<?php

namespace App\Http\Controllers;

use App\service_offers;
use App\service;
use App\Items;
use Illuminate\Http\Request;

class serviceOffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offer= service_offers::where('service_id','=',$service->id)->orderBy('created_at','desc')->get();
        dd($offer);
        return view('/service/offer/index' , compact('offer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(service $service)
    {   
                
        return view('/service/offer/create' , compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        
        $offer= new service_offers;
        $offer->service_id = $request->input('service_id') ;
        $offer->company_id = $request->input('company') ;
        $offer->referance = $request->input('referance') ;
        $offer->deliveryTerms = $request->input('deliveryTerms') ;
        $offer->deliveryTime = $request->input('deliveryTime') ;
        $offer->paymentType = $request->input('paymentType') ;
        $offer->validTime = $request->input('validTime') ;
        $offer->commercialTerms = $request->input('commercialTerms') ;
        $offer->authorizedPersonId = 1 ;
        $total=0;
        
        foreach ($request->input('item') as $value) {
            $total+=$value["subTotal"];
        }
        
        $offer->total = $total ;
        $offer->save();
        
        
        foreach ($request->input('item') as $key => $feild) {
            $item= new Items;
            $item->type = 'serviceOffer';
            $item->productCode = $feild['mat'];
            $item->description = $feild['description'];
            $item->amount = $feild['qty'];
            $item->unit = 'piece';
            $item->unitPrice = $feild['unitPrice'];
            $item->discount = 0;
            $item->currency = 'EURO';
            $item->deliveryTime = 'two days';
            $item->orderId = $offer->id;
            $n=$offer->item()->save($item);           
        }
        

        //$product = service::find($offer->service_id)->product;
        
        return redirect("service/offer/$offer->id" );
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\service_offers  $service_offers
     * @return \Illuminate\Http\Response
     */
    public function show(service_offers $offer)
    {
        //$offers = $offer->where('service_id','=',$offer->service_id)->orderBy('created_at','desc')->paginate(1);
        return view('/service/offer/show' , compact('offer') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\service_offers  $service_offers
     * @return \Illuminate\Http\Response
     */
    public function edit(service_offers $offer)
    {
        return view("service.offer.edit" , compact('offer') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\service_offers  $service_offers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, service_offers $offer)
    {   
        
        $offer->update($request->input('offer'));
        foreach ($request->input('item') as $key => $value) {
            $offer->item()->find($request->input('itemId')[$key])->update($value);
        }

        return view("/service/offer/edit" , compact('offer') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\service_offers  $service_offers
     * @return \Illuminate\Http\Response
     */
    public function destroy(service_offers $offer)
    {
            $offer->delete();
        return redirect('/service/offer');
    }


    public function serviceOfferIndex($id)
    {   
        $offer= service_offers::where('service_id','=',$id)->orderBy('created_at','desc')->get();
        
        return view('/service/offer/serviceOfferIndex' , compact('offer','id'));
    }

}
