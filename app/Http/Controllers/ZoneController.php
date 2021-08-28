<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreZoneRequset;
use App\Http\Requests\UpdateZoneRequset;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $zones = Zone::all();
        return view('Zone.index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function create()
    {
        $code = Zone::count();

        if (!$code) {
            $code = 'zone' . 1;
        } else {
            $lastZoneCode = Zone::latest()->first()->code;
            $newcode = substr($lastZoneCode, 4) + 1;
            $code = 'zone' . $newcode;
        }

        return view('Zone.create', compact('code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreZoneRequset $request)
    {
        $zone = new Zone;
        $zone->code = $request->code;
        $zone->long_des = $request->long_des;
        $zone->short_des = $request->short_des;
        $zone->save();

        return redirect()->route('zone.index')->with('success', 'Zone successfully inserted!');
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
        $zone = Zone::find($id);

        return view('Zone.edit', compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateZoneRequset $request, $id)
    {
        $zone = Zone::find($id);
        $zone->code = $request->code;
        $zone->long_des = $request->long_des;
        $zone->short_des = $request->short_des;
        $zone->save();

        return redirect()->route('zone.index')->with('success', 'Zone successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
