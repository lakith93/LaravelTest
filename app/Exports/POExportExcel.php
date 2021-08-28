<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class POExportExcel implements FromCollection, WithHeadings
{
    protected $poNumber;

    public function __construct($poNumber)
    {
        $this->poNumber = $poNumber;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('p_o_s')
            ->join('zones', 'zones.id', 'p_o_s.zone_id')
            ->join('regions', 'regions.id', 'p_o_s.region_id')
            ->join('territories', 'territories.id', 'p_o_s.territory_id')
            ->join('users', 'users.id', 'p_o_s.distributor_id')
            ->join('p_o_products', 'p_o_products.po_id', 'p_o_s.id')
            ->where('p_o_s.po_number', $this->poNumber)
            ->select('p_o_products.sku_code', 'p_o_products.up', 'p_o_products.units', 'p_o_products.total',)
            ->get();
    }

    public function headings(): array
    {
        return [
            "SKU Code",
            "Unit Price",
            "Units",
            "Total"
        ];
    }
}
