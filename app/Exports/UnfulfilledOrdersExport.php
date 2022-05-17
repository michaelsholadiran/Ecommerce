<?php

namespace App\Exports;

use App\Models\CustomerOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UnfulfilledOrdersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return ["Order Id", "Name","Total","Note"];
    }


    public function collection()
    {
        // return CustomerOrder::all();
        return collect(CustomerOrder::getOrders());
    }
}
