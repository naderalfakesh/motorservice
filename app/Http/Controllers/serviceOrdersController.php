<?php

namespace App\Http\Controllers;

use App\service_orders;
use Illuminate\Http\Request;

class serviceOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $order = service_orders::orderBy('created_at','desc')->get();

        return view('/service/order/index' , compact('order') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/service/order/create');
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
     * @param  \App\service_orders  $service_orders
     * @return \Illuminate\Http\Response
     */
    public function show(service_orders $order)
    {
        return view('/service/order/show' , compact('order') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\service_orders  $service_orders
     * @return \Illuminate\Http\Response
     */
    public function edit(service_orders $service_orders)
    {
        return view('/service/order/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\service_orders  $service_orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, service_orders $service_orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\service_orders  $service_orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(service_orders $service_orders)
    {
        //
    }
}
