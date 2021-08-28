<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSKURequset;
use App\Models\SKU;
use Illuminate\Http\Request;

class SKUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skus = SKU::all();

        return view('SKU.index', compact('skus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sku = SKU::count();

        if (!$sku) {
            $id = 1;
        } else {
            $lastSKUCode = SKU::latest()->first()->id;
            $newCode = $lastSKUCode + 1;
            $id = $newCode;
        }
        return view('SKU.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSKURequset $request)
    {
        $sku = new SKU();
        $sku->id = $request->id;
        $sku->code = $request->code;
        $sku->name = $request->name;
        $sku->mrp = $request->mrp;
        $sku->dis_price = $request->dis_price;
        $sku->weight = $request->weight;
        $sku->volume = $request->volume;
        $sku->save();

        return redirect()->route('sku.index')->with('success', 'SKU successfully inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
