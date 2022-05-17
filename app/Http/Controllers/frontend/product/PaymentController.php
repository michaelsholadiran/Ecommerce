<?php

namespace App\Http\Controllers\frontend\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Models\CustomerOrder;



use App\Models\MailSubscriber;
use Stevebauman\Location\Facades\Location;


//Paypal
// namespace App\custom_classes;

use PayPalCheckoutSdk\Core\PayPalHttpClient;


use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return [$request->all()];
        $this->validate($request, [
          'email' => 'required|email',
        'firstname' => 'required',
        'lastname' => 'required',

        'address' => 'required',
        'apartment' => 'required',
        'city' => 'required',
        'postcode' => 'required',
        'country' => 'required',
        'state' => 'required',
        'phone' => 'required',


         ]);
        // return  MailSubscriber::find($request->email);
        if ($request->subscriber) {
            if (!MailSubscriber::where('email', '=', $request->email)->first()) {
                // code...

                if ($position = Location::get()) {
                    $countryName=$position->countryName;
                } else {
                    $countryName='No Data Found';
                }

                $MS=new MailSubscriber();
                $MS->email= $request->email;
                $MS->country= $countryName;
                $MS->subscribed= 1;
                $MS->ip_address= request()->ip();

                $MS->save();
            }
        }
        // Note :this was design for only one product

        $orders = json_decode($request->cart, true);

        // return $request->all();
        // $customer = new Customer();
        // $customer->name = $request->firstname . " " . $request->lastname;
        // $customer->email = $request->email;
        // $customer->phone = $request->phone;
        // $customer->country = $request->country;
        // $customer->state = $request->state;
        // $customer->address = $request->address;
        // $customer->save();
        // // return $customer->id;
        // $customer_id = $customer->id;
        // $order_id = time();
        $total_price=0;
        foreach ($orders as $ord) {
            $product = Product::find($ord['product_id']);
            $total_price+=$product->price *  $ord['quantity'];
        }
        $customer_order = new CustomerOrder();
        // $customer_order->customer_id = $customer_id;
        $customer_order->first = $request->firstname;
        $customer_order->last =$request->lastname;
        $customer_order->email = $request->email;
        $customer_order->phone = $request->phone;
        $customer_order->country = $request->country;
        $customer_order->state = $request->state;
        $customer_order->address = $request->address;
        $customer_order->postcode = $request->postcode;
        $customer_order->city = $request->city;
        $customer_order->apartment = $request->apartment;
        $customer_order->company = $request->company;
        $customer_order->discount =0;
        $customer_order->tax =0;
        $customer_order->paid =0;
        $customer_order->fulfilled =0;
        $customer_order->total_price =$total_price;
        // $customer_order->order_id = $order_id;
        $customer_order->note = $request->note;
        $customer_order->save();

        $order_id =  $customer_order->id;

        foreach ($orders as $ord) {
            $product = Product::find($ord['product_id']);
            $order = new Order();
            $order->product_id = $product->id;
            // $order->paid = 0;
            $order->order_id = $order_id;
            // $order->fulfilled = 0;
            $order->price = $product->price *  $ord['quantity'];
            $order->quantity = $ord['quantity'];
            // $order->country= $request->country;
            // $order->state= $request->state;
            // $order->size = $ord['size'];
            $order->color = $ord['color'];
            $order->image = $ord['image'];
            // $order->address= $request->address;
            // $order->message = $request->notes;
            $order->save();
        }

           \Mail::to("sholadiranmichael@gmail.com")->send(new \App\Mail\SucessfulOrderMail($order_id));
        return self::createOrder($customer_order, $total_price);

        // if ($request->payment == "paypal") {
        //     return Paypal::createOrder($customer_order, $total_price);
        // } else {
        //     return 'other payment';
        //   }
    }

    public function paypalReturn($orderId)
    {
        // return [$orderId];
        return self::paypalReturn2($orderId);
    }
    public function paypalCancel()
    {
        return "canceled";
    }

    public function orderConfirmation()
    {
        $id=session()->get('order_id');
        $order=  CustomerOrder::findOrFail($id);
        return view('frontend.order_confirmation', compact('order'));
    }

    public function printOrderConfirmation()
    {
        return view('frontend.includes.order_confirmation');
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






      public static function client()
    {
        if (config('services.paypal.paypal_mode') == "sandbox") {
            $clientId = config('services.paypal.client_id_sandbox');
            $clientSecret = config('services.paypal.secret_id_sandbox');
            $environment = new \PayPalCheckoutSdk\Core\SandboxEnvironment($clientId, $clientSecret);
        } else {
            $clientId = config('services.paypal.client_id_production');
            $clientSecret = config('services.paypal.secret_id_production');
            $environment = new \PayPalCheckoutSdk\Core\ProductionEnvironment($clientId, $clientSecret);
        }

        $client = new PayPalHttpClient($environment);
        return $client;
    }


    public static function createOrder($customer_order, $total_price, $debug=false)
    {
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = self::buildRequestBody($customer_order);
        // 3. Call PayPal to set up a transaction
        // $client = PayPalClient::client();
        $client =  self::client();

        // $response = $client->execute($request);

        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);

            session()->put('order_id', $customer_order->id);
            return response()->json($response->result);


            //server side code just uncomment
            // if ($response->statusCode == 201) {
            //     session()->put('paypal_order_id', $response->result->id);
            //     session()->put('order_id', $customer_order->id);
            //     foreach ($response->result->links as $link) {
            //         if ($link->rel == "approve") {
            //             // return 'll';
            //             return response()->json(['link' => $link->href, 'page' => "checkout"]);
            //         }
            //     }
            // }

            // If call returody in response, you can get the deserialized version from the result attribute of the response
            // echo "<pre>";
            // print_r($response);
            // echo "</pre>";
        } catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }


        if ($debug) {
            print "Status Code: {$response->statusCode}\n";
            print "Status: {$response->result->status}\n";
            print "Order ID: {$response->result->id}\n";
            print "Intent: {$response->result->intent}\n";
            print "Links:\n";
            foreach ($response->result->links as $link) {
                print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
            }

            // To print the whole response body, uncomment the following line
      // echo json_encode($response->result, JSON_PRETTY_PRINT);
        }

        // 4. Return a successful response to the client.

        // return $response;
    }


    private static function buildRequestBody($customer_order)
    {
        $items=[];
        $i=0;
        $orders=Order::where('order_id', $customer_order->id)->get();
        foreach ($orders as $o) {
            $items[]=array(
            'name' => $o->product->title,
            'description' => $o->color,
            // 'sku' => '',
            'unit_amount' =>
              array(
                'currency_code' => 'USD',
                'value' =>  $o->product->price,
              ),
            'tax' =>
              array(
                'currency_code' => 'USD',
                'value' => '00.00',
              ),
            'quantity' => $o->quantity,
            'category' => 'PHYSICAL_GOODS',
          );
            $i++;
        }
        return array(
  'intent' => 'CAPTURE',
  'application_context' =>
    array(
      // 'return_url' => url(route('frontend.paypal.return')),
      // 'cancel_url' => url(route('frontend.paypal.cancel')),
      'brand_name' => config('app.name'),
      'locale' => 'en-US',
      'landing_page' => 'BILLING',
      'shipping_preference' => 'SET_PROVIDED_ADDRESS',
      'user_action' => 'PAY_NOW',
    ),
  'purchase_units' =>
    array(
      0 =>
        array(
          'reference_id' => $customer_order->id,
          'description' => 'Sporting Goods',
          'custom_id' => 'CUST-HighFashions',
          'soft_descriptor' => 'HighFashions',
          'amount' =>
            array(
              'currency_code' => 'USD',
              'value' => round($customer_order->total_price,2),
              'breakdown' =>
                array(
                  'item_total' =>
                    array(
                      'currency_code' => 'USD',
                      'value' =>  round($customer_order->total_price,2),
                    ),
                  'shipping' =>
                    array(
                      'currency_code' => 'USD',
                      'value' => '00.00',
                    ),
                  'handling' =>
                    array(
                      'currency_code' => 'USD',
                      'value' => '00.00',
                    ),
                  'tax_total' =>
                    array(
                      'currency_code' => 'USD',
                      'value' => '00.00',
                    ),
                  'shipping_discount' =>
                    array(
                      'currency_code' => 'USD',
                      'value' => '00.00',
                    ),
                ),
            ),
          'items' =>$items,
          'shipping' =>
            array(
              // 'method' => '',
              'address' =>
                array(
                  'address_line_1' => $customer_order->address,
                  // 'address_line_2' => '',
                  'admin_area_2' => $customer_order->city,
                  // 'admin_area_1' => '',
                  'postal_code' => $customer_order->postcode,
                  'country_code' => "US",

                ),
            ),
        ),
    ),
);
    }

    public static function paypalReturn2($paypal_order_id)
    {
        // Here, OrdersCaptureRequest() creates a POST request to /v2/checkout/orders
        // $response->result->id gives the orderId of the order created above
        // server side:
        // $paypal_order_id =session()->get('paypal_order_id');
        $request = new OrdersCaptureRequest($paypal_order_id);
        $request->prefer('return=representation');
        $client =  self::client();
        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);

            if ($response->statusCode == 201) {
                if (strtoupper($response->result->status) == 'COMPLETED') {
                    $id=session()->get('order_id');
                    $customer_order=CustomerOrder::findOrFail($id);
                    $customer_order->paid=1;
                    $customer_order->save();

                    // session()->forget(['order_id']);
                    try {
                        $details=['subject'=>'#'.$customer_order->id." - Order Confirmation"];
                        \Mail::to($customer_order->email)->send(new \App\Mail\OrderConfirmationMail($details));
                        \Mail::to("sholadiranmichael@gmail.com")->send(new \App\Mail\SucessfulOrderMail());
                    } catch (\Exception $e) {
                    }


                    return response()->json(['status' => 1, 'notification' => "Your order has been processed",'link'=>route('frontend.checkout.order_confirmation')]);
                }
            }
            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            // print_r($response);
        } catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }
}
