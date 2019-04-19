<?php

namespace App\Http\Controllers;

use App\service_offers;
use App\service;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(service $service)
    {   
        $company = $service->company('')->get();
        
        return view('/service/offer/create' , compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\service_offers  $service_offers
     * @return \Illuminate\Http\Response
     */
    public function show(service_offers $service_offers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\service_offers  $service_offers
     * @return \Illuminate\Http\Response
     */
    public function edit(service_offers $service_offers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\service_offers  $service_offers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, service_offers $service_offers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\service_offers  $service_offers
     * @return \Illuminate\Http\Response
     */
    public function destroy(service_offers $service_offers)
    {
        //
    }
}
