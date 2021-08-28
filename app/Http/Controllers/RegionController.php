<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegionRequset;
use App\Http\Requests\UpdateRegionRequset;
use App\Models\Region;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $regions = DB::table('zones')
            ->join('regions', 'regions.zone_id', 'zones.id')
            ->select('zones.code as zone_id', 'regions.code', 'regions.name', 'regions.id')
            ->get();

        return view('Region.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $zoneCodes = Zone::all();
        $region = Region::count();

        if (!$region) {
            $code = 'region' . 1;
        } else {
            $lastRegionCode = Region::latest()->first()->code;
            $newCode = substr($lastRegionCode, 6) + 1;
            $code = 'region' . $newCode;
        }

        return view('Region.create', compact('zoneCodes', 'code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRegionRequset $request)
    {
        $region = new Region;
        $region->zone_id = $request->zone_id;
        $region->code = $request->code;
        $region->name = $request->name;
        $region->save();

        return redirect()->route('region.index')->with('success', 'Region successfully inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zoneCodes = Zone::all();
//        $region = Region::find($id);
        $region = DB::table('zones')
            ->join('regions', 'regions.zone_id', 'zones.id')
            ->where('regions.id', $id)
            ->select('zones.code as zone_id', 'regions.code as code', 'regions.name as name', 'regions.id as id')
            ->get();

        $region = $region[0];

        return view('Region.edit', compact('zoneCodes', 'region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRegionRequset $request, $id)
    {
//        return $request;
//        $zoneId =  Zone::where('code', $request->zone_id)->get();

        $region = Region::find($id);
        $region->zone_id = $request->zone_id;
        $region->code = $request->code;
        $region->name = $request->name;
        $region->save();

        return redirect()->route('region.index')->with('success', 'Region successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
