<?php
namespace Sbhadra\Payapi\Http\Controllers;
use Juzaweb\Http\Controllers\FrontendController;
use Juzaweb\Http\Controllers\BackendController;
use Sbhadra\Photography\Models\Booking;
use Illuminate\Http\Request;
use Session;

class PayapiController extends FrontendController
{
    public function doPayment($payment_data)
    {
        $bsid=base64_encode($payment_data['booking_id']);
        
        $params = [
            'endpoint' => 'PaymentRequestExicute',
            'apikey' => 'CKW-1640114323-2537',
            'PaymentMethodId' => '1',
            'CustomerName' => $payment_data['customer_name'],
            'DisplayCurrencyIso' => 'KWD',
            'MobileCountryCode' => '+965',
            'CustomerMobile' => $payment_data['mobile_number'],
            'CustomerEmail' => 'nasserhatab@gmail.com',
            'InvoiceValue' =>  ($payment_data['pay_amount']?$payment_data['pay_amount']:$payment_data['booking_price']),
            'CallBackUrl' => url('payment/success').'/?bsid='.$bsid,
            'ErrorUrl' =>  url('payment/failed').'/?bsid='.$bsid,
            'Language' => 'en',
            'CustomerReference' => 'Ref 0003',
            'CustomerAddress[Block]' => '4',
            'CustomerAddress[Street]' => '10',
            'CustomerAddress[HouseBuildingNo]' => '4',
            'CustomerAddress[Address]' => 'adan',
            'CustomerAddress[AddressInstructions]' => '3rd floor',
            'InvoiceItems[0][ItemName]' => $payment_data['customer_name'],
            'InvoiceItems[0][Quantity]' => '1',
            'InvoiceItems[0][UnitPrice]' => ($payment_data['pay_amount']?$payment_data['pay_amount']:$payment_data['booking_price']),
            'ShippingConsignee[CityName]' => 'DUBAI',
            'ShippingConsignee[PostalCode]' => '12345',
            'ShippingConsignee[CountryCode]' => 'AE',
            'SourceInfo' => '',
            'Suppliers[0][SupplierCode]' => '3',
            'Suppliers[0][ProposedShare]' => 'null',
            'Suppliers[0][InvoiceShare]' => '0.00'
        ];

        $curl = curl_init();
        // $certificate_location = 'C:\wamp64\bin\php\php7.2.33\extras\ssl\cacert.pem';
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, $certificate_location);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, $certificate_location);
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://createkwservers.com/payapi/api/v2/index.php",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($params),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo "cURL Error #:" . $err;
                return redirect()->back()->withErrors(['msg' => 'The Message']);
            } else {
                $res = json_decode($response);
                //dd($res);
                if($res->type == 'success' && isset($res->data->InvoiceId)){
                    $PaymentURL = $res->data->PaymentURL;
                    $InvoiceId = $res->data->InvoiceId;
                    $booking = Booking::find($payment_data['booking_id']);
                    $booking->transaction_id =  '';
                if($booking->save()){
                    //var_dump($booking);
                    //return redirect()->away($PaymentURL);
                    //return \Redirect::intended($PaymentURL);
                    //echo '<script>window.location.replace("'.'");</script>';
                    //Session::put('booking_data', $payment_data);
                    header("Location: ".$PaymentURL);
                    exit();
                    
                }
                    
                }else{
                    return redirect()->back()->withErrors(['msg' => 'The Message']);
                }
            }
       
    }
    public function paymentSuccess(){
       
        if(isset($_REQUEST['paymentId'])){
            $bsid = base64_decode($_REQUEST['bsid']);
            echo $paymentId = $_REQUEST['paymentId'];
            $params = [
                'endpoint' => 'PaymentStatusCheck',
                'apikey' => 'CKW-1640114323-2537',
                'Key' => $paymentId,
                'KeyType' => 'paymentId'
            ];
            $curl = curl_init();
            // $certificate_location = 'C:\wamp64\bin\php\php7.2.33\extras\ssl\cacert.pem';
            // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, $certificate_location);
            // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, $certificate_location);
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://createkwservers.com/payapi/api/v2/index.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($params),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
           ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo "cURL Error #:" . $err;
                return redirect()->back()->withErrors(['msg' => 'The Message']);
            } else {
                $res = json_decode($response);
                dd($res);
                if($res->type == 'success' && isset($res->data->InvoiceId)){
                     $booking = Booking::find($bsid);
                     $booking->transaction_id =  $res->data->InvoiceId;
                     $booking->status =  'Yes';
                     if($booking->save()){
                        dd($booking);
                     }
                }else{
                    
                }
            //$booking_data = Session::get("booking_data");
            //dd($booking_data);
            }
        }
    }
}
 