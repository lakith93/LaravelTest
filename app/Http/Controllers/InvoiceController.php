<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\PO;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = DB::table('invoices')
            ->join('p_o_s', 'p_o_s.id', 'invoices.po_id')
            ->join('users', 'users.id', 'invoices.dis_id')
            ->select('invoices.id as id', 'p_o_s.po_number as po_number', 'users.name as dis_name', 'invoices.in_number as in_number', 'invoices.date as date')
            ->get();

        return view('Invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $pos = DB::table('p_o_s')
            ->join('users', 'users.id', 'p_o_s.distributor_id')
            ->select('p_o_s.id as id', 'p_o_s.po_number as po_number', 'users.name as dis_name', 'p_o_s.date as date', 'p_o_s.invoice_completed as is_completed')
            ->get();

        return view('Invoice.create', compact('pos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'po_id' => 'required'
        ]);
        foreach ($request->po_id as $req) {

            $invoice = Invoice::count();

            if (!$invoice) {
                $inNumber = 'Invoice' . 1;
            } else {
                $lastInvoiceNumber = Invoice::latest()->first()->in_number;
                $newInvoiceNumber = substr($lastInvoiceNumber, 7) + 1;
                $inNumber = 'Invoice' . $newInvoiceNumber;
            }

            $disId = PO::where('id', $req)->get();

            $invoice = new Invoice();
            $invoice->po_id = $req;
            $invoice->in_number = $inNumber;
            $invoice->date = Carbon::now()->isoFormat('YYYY-MM-DD');
            $invoice->dis_id = $disId[0]->distributor_id;
            $invoice->save();

            $po = PO::where('id', $req)
                ->update(['invoice_completed' => 1]);
        }


        return redirect()->route('invoice.create')->with('success', 'Bulk Invoice successfully created!');

    }

    public function storeById($poId)
    {
        $invoice = Invoice::count();

        if (!$invoice) {
            $inNumber = 'Invoice' . 1;
        } else {
            $lastInvoiceNumber = Invoice::latest()->first()->in_number;
            $newInvoiceNumber = substr($lastInvoiceNumber, 7) + 1;
            $inNumber = 'Invoice' . $newInvoiceNumber;
        }

        $po = PO::where('id', $poId)->get();

        $invoice = new Invoice();
        $invoice->po_id = $poId;
        $invoice->in_number = $inNumber;
        $invoice->date = Carbon::now()->isoFormat('YYYY-MM-DD');
        $invoice->dis_id = $po[0]->distributor_id;
        $invoice->save();

        $po = PO::where('id', $poId)
            ->update(['invoice_completed' => 1]);

        return redirect()->route('invoice.create')->with('success', 'Invoice successfully created!');
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
}
