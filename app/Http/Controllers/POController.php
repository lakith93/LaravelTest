<?php

namespace App\Http\Controllers;

use App\Exports\POExcel;
use App\Exports\POExportExcel;
use App\Http\Requests\SearchPORequset;
use App\Http\Requests\StorePORequset;
use App\Models\PO;
use App\Models\POProducts;
use App\Models\Region;
use App\Models\SKU;
use App\Models\Territory;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class POController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regionCodes = Region::all();
        $territoryCodes = Territory::all();
        $pos = 0;
        return view('PO.index', compact('regionCodes', 'territoryCodes', 'pos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $zoneCodes = Zone::all();
        $regionCodes = Region::all();
        $territoryCodes = Territory::all();
        $skus = SKU::all();
        $distributors = User::where('is_admin', 0)->get();
        $po = PO::count();

        if (!$po) {
            $poNumber = 'PONumber' . 1;
        } else {
            $lastPONumber = PO::latest()->first()->po_number;
            $newPONumber = substr($lastPONumber, 8) + 1;
            $poNumber = 'PONumber' . $newPONumber;
        }

        return view('PO.create', compact('zoneCodes', 'regionCodes', 'territoryCodes', 'skus', 'distributors', 'poNumber'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePORequset $request)
    {
        $po = new PO();
        $po->zone_id = $request->zone_id;
        $po->region_id = $request->region_id;
        $po->territory_id = $request->territory_id;
        $po->distributor_id = $request->distributor_id;
        $po->date = $request->date;
        $po->po_number = $request->po_number;
        $po->remark = $request->remark;
        $po->save();

        $count = SKU::count();


        for ($i = 1; $count >= $i; $i++) {
            $sku_code = 'sku_code' . $i;
            $up = 'dis_price' . $i;
            $units = 'units' . $i;
            $total = 'total' . $i;
            if ($request->$units && $request->$total) {

//                $poProducts[] = [
//                    'po_id' => $po->id,
//                    'sku_code' => $request->$sku_code,
//                    'up' => $request->$up,
//                    'units' => $request->$units,
//                    'total' => $request->$total
//                ];

                $poProducts = new POProducts();
                $poProducts->po_id = $po->id;
                $poProducts->sku_code = $request->$sku_code;
                $poProducts->up = $request->$up;
                $poProducts->units = $request->$units;
                $poProducts->total = $request->$total;
                $poProducts->save();
//                ];
            }
        }

//        return $poProducts;
//        $po->poProducts()->create($poProducts);
//
//        return $po;
//
        return redirect()->route('po.create')->with('success', 'PO successfully created!');
    }

    public function search(Request $request)
    {
        $regionId = $request->region_id;
        $territoryId = $request->territory_id;
        $poNumber = $request->po_number;
        $fromDate = $request->from_date;
        $toDate = $request->to_date;

//        $total = DB::table('p_o_s')
//            ->join('p_o_products', 'p_o_products.po_id', 'p_o_s.id')
//            ->where('p_o_s.po_number', $poNumber)
//            ->select(DB::raw('SUM(p_o_products.total) as total'))
//            ->get();

        $po = DB::table('p_o_s')
            ->join('zones', 'zones.id', 'p_o_s.zone_id')
            ->join('regions', 'regions.id', 'p_o_s.region_id')
            ->join('territories', 'territories.id', 'p_o_s.territory_id')
            ->join('users', 'users.id', 'p_o_s.distributor_id')
//            ->leftJoin('p_o_products', 'p_o_products.po_id', 'p_o_s.id')
            ->where(function ($query) use ($regionId, $territoryId, $poNumber, $fromDate, $toDate) {
                if (isset($regionId)) {
                    $query->where('p_o_s.region_id', $regionId);
                }
                if (isset($territoryId)) {
                    $query->where('p_o_s.territory_id', $territoryId);
                }
                if (isset($poNumber)) {
                    $query->where('p_o_s.po_number', $poNumber);
                }
                if (isset($fromDate) && isset($toDate)) {
                    $query->whereBetween('p_o_s.date', [$fromDate, $toDate]);
                }
            })
            ->select('regions.code as region_code', 'territories.code as territory_code', 'users.name as name', 'p_o_s.po_number as po_number',
                'p_o_s.date as date', 'p_o_s.id as id')
            ->get();


//        $po = $total;
//        $pp = PO::find($po[0]->id);
//        $total = $pp->poProducts->sum('total');
//        $po->poProducts()->create($poProducts);

        return $po;
//        return view('PO.index')->with(['regionCodes' => $regionCodes, 'territoryCodes' => $territoryCodes, 'pos' => $po]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Request $request, $id)
    {
//        $regionCodes = Region::all();
//        $territoryCodes = Territory::all();
//
//        $po = DB::table('pos')
//            ->join('zones', 'zones.id', 'pos.zone_id')
//            ->join('regions', 'regions.id', 'pos.region_id')
//            ->join('territories', 'territories.id', 'pos.territory_id')
//            ->join('users', 'users.id', 'pos.distributor_id')
//            ->where('pos.po_number', $request->po_number)
//            ->select('regions.code as region_code', 'territories.code as territory_code', 'users.name as name', 'pos.po_number as po_number',
//                'pos.date as date')
//            ->get();
//
//        return $po;
//        return view('PO.index')->with(['regionCodes' => $regionCodes, 'territoryCodes' => $territoryCodes, 'pos' => $po]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function exportExcel($poNumber)
    {
        return Excel::download(new POExportExcel($poNumber), 'POSheet.xlsx');
//        return Excel::download(new POExportExcel($request->po_number), 'POSheet.xlsx');
    }

    public function poNumber($poNumber)
    {
        $number = PO::where('po_number', 'LIKE', $poNumber . '%')->select('po_number')->get();

//        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
//        foreach ($number as $row) {
//            $output .= '
//       <li><a href="#">' . $row->po_number . '</a></li>
//       ';
//        }
//        $output .= '</ul>';
//        echo $output;

        return $number;
    }
}
