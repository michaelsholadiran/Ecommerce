<?php

namespace App\Http\Controllers\backend\orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Customer;
use App\Models\CustomerOrder;
use App\Exports\UnfulfilledOrdersExport;
use Excel;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportUnfulfilledOrdersToExcel()
    {
        return Excel::download(new UnfulfilledOrdersExport, "unfulfilled_orders.xlsx");
    }
    public function index()
    {
        try {
            // $list=Customer::orderBy('created_at', 'desc')->get();
            $all_list = CustomerOrder::orderBy('created_at', 'desc')->get();
            $fulfilled_list = CustomerOrder::where('fulfilled', 1)->orderBy('created_at', 'desc')->get();
            $unfulfilled_list = CustomerOrder::where('fulfilled', 0)->orderBy('created_at', 'desc')->get();
            $paid_list = CustomerOrder::where('paid', 1)->orderBy('created_at', 'desc')->get();
            $unpaid_list = CustomerOrder::where('paid', 0)->orderBy('created_at', 'desc')->get();
            // $list=Order::whereIn(['order_id'=>$listb])->get();
            // $list=Order::select(['order_id','customer _id'])->distinct()->get();
        } catch (\Exception $e) {
            $all_list=[];
            $fulfilled_list=[];
            $unfulfilled_list=[];
            $paid_list=[];
            $unpaid_list=[];
        }

        return view('backend.orders.index', compact(
            'all_list',
            'fulfilled_list',
            'unfulfilled_list',
            'paid_list',
            'unpaid_list',
        ));
    }

    public function updateOrderID(Request $request, $id)
    {
        $this->validate($request, [
      'order_id' => 'required',
       ]);

        $co=  CustomerOrder::find($id);
        $co->order_id=$request->order_id;
        $co->save();
        return response()->json(['status'=>1,'notification'=>" Successfully"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = CustomerOrder::findOrFail($id);

        return view('backend.orders.show', compact('id', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($l)
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
    public function toggle_fulfilled(Request $request, $id)
    {
        CustomerOrder::where('id', $id)->update(['fulfilled' => $request->status]);
        Order::where('order_id', $id)->update(['fulfilled' => $request->status]);

        // $order->fulfilled= $request->status;

        return  redirect()->back();
    }


    public function toggle_paid(Request $request, $id)
    {
        CustomerOrder::where('id', $id)->update(['paid' => $request->status]);
        Order::where('order_id', $id)->update(['paid' => $request->status]);

        // $order->fulfilled= $request->status;

        return  redirect()->back();
    }
}
