<?php
namespace App\custom_classes;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
// use PayPalCheckoutSdk\Core\SandboxEnvironment;

use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

use App\Models\CustomerOrder;
use App\Models\Order;

class Paypal
{
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
            'description' => $o->color." ".$o->size,
            // 'sku' => '',
            'unit_amount' =>
              array(
                'currency_code' => 'USD',
                'value' => $o->product->price,
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
              'value' => $customer_order->total_price,
              'breakdown' =>
                array(
                  'item_total' =>
                    array(
                      'currency_code' => 'USD',
                      'value' =>  $customer_order->total_price,
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
                  'country_code' => $customer_order->country,

                ),
            ),
        ),
    ),
);
    }

    public static function paypalReturn($paypal_order_id)
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
