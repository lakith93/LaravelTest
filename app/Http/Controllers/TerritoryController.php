<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTerritoryRequset;
use App\Http\Requests\UpdateTerritoryRequset;
use App\Models\Region;
use App\Models\Territory;
use App\Models\Zone;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TerritoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $territories = DB::table('territories')
            ->join('regions', 'regions.id', 'territories.region_id')
            ->join('zones', 'zones.id', 'territories.zone_id')
            ->select('zones.code as zone_id', 'regions.code as region_id', 'territories.name', 'territories.code', 'territories.id')
            ->get();

        return view('Territory.index', compact('territories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $zoneCodes = Zone::all();
        $regionCodes = Region::all();
        $territory = Territory::count();

        if (!$territory) {
            $code = 'territory' . 1;
        } else {
            $lastTerritoryCode = Territory::latest()->first()->code;
            $newCode = substr($lastTerritoryCode, 9) + 1;
            $code = 'territory' . $newCode;
        }

        return view('Territory.create', compact('zoneCodes', 'regionCodes', 'code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTerritoryRequset $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTerritoryRequset $request)
    {
        $territory = new Territory();
        $territory->zone_id = $request->zone_id;
        $territory->region_id = $request->region_id;
        $territory->code = $request->code;
        $territory->name = $request->name;
        $territory->save();

        return redirect()->route('territory.index')->with('success', 'Territory successfully inserted!');
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
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zoneCodes = Zone::all();
        $regionCodes = Region::all();

        $territory = DB::table('territories')
            ->join('regions', 'regions.id', 'territories.region_id')
            ->join('zones', 'zones.id', 'territories.zone_id')
            ->where('territories.id', $id)
            ->select('zones.code as zone_id', 'regions.code as region_id', 'territories.name', 'territories.code', 'territories.id')
            ->get();

        $territory = $territory[0];

        return view('Territory.edit', compact('zoneCodes', 'regionCodes', 'territory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTerritoryRequset $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTerritoryRequset $request, $id)
    {
        $territory = Territory::find($id);
        $territory->zone_id = $request->zone_id;
        $territory->region_id = $request->region_id;
        $territory->code = $request->code;
        $territory->name = $request->name;
        $territory->save();

        return redirect()->route('territory.index')->with('success', 'Territory successfully updated!');
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
