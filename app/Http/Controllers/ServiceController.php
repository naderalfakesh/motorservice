<?php

namespace App\Http\Controllers;

use App\service;
use App\company;
use App\contact;
use App\product;
use App\ServicePictures;
// use App\product;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = service::all();
        return view('/service/index')->with('service',$service);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = company::all();
        $contact = contact::all();
        // $product = product::all();
         return view('/service/create' , compact('company','contact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // insert service
        $service = new service;
        $service = $service->create($request->except('motor','company','personincontact','activePictursIds'));
        
        /* You should check wich product is selected then you continue regarding that */

        // insert product 
        $product = new product;
        $product->type= 'motor';
        $product->specifics = json_encode($request->input('motor'));
        $product->save();
        $service->product()->attach($product->id);

        //insert company role
        $companyId = $request->input('company');
        $service->company('')->attach($companyId ,['role'=>'requestingCompany'] );

        //insert contact relation
        $contact = $request->input('personincontact');
        $service->contact('')->attach($contact ,['role'=>'personincontact'] );
        
        // insert images
        $images = $request->file('activePictursIds');
        foreach ($images as  $image) {
            $picture['link'] = $image->store('images');;
            $picture ['title'] = $image->getClientOriginalName();
            $picture ['description'] = $picture['link'].$picture ['title'];
            $service->picture()->create($picture);
        }
        
        return redirect('service/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        return view('service/show' , compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(service $service)
    {
        //
    }
}
