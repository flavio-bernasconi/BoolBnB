<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree_Transaction;
use Braintree_Gateway;
use App\Flat;
use App\User;
use App\Detail;
use App\Payment;
use DB;
class PaymentsController extends Controller
{

    public function index($id) {

        $singleFlat = Flat::findOrFail($id);

        $userID = $singleFlat -> user_id;
        $user = User::where('id', $userID)->get();
        $user = $user[0];

        $detail = Detail::where('flat_id', $id)->get();
        $detail = $detail[0];

        return view('sponsorPage', compact('singleFlat', 'user', 'detail','id'));
    }

    public function pagamento(Request $request) {
      $flat_id =$request -> flatid;

      $datiPagamento = $request -> validate([
        'costo' => 'required',
        'name' => 'required',
        'title' => 'required',
        'id' => 'required'
      ]);

      $costo = $datiPagamento['costo'];
      $name = $datiPagamento['name'];
      $title = $datiPagamento['title'];
      $id = $datiPagamento['id'];

      if ($costo == '2.99') {
        $ore = '24 ore';
      } else if ($costo == '5.99') {
        $ore = '72 ore';
      } else ($costo == '9.99') {
        $ore = '144 ore'
      };

      return view('payment', compact('costo', 'name', 'title', 'ore', 'id','flat_id'));
    }

    /*  Function is to process payment on braintree */
    public function make(Request $request)
    {
      $payload = $request->input('payload', false);
      $nonce = $payload['nonce'];
      $gateway = $this->brainConfig();
      $status = $gateway->transaction()->sale([
                      'amount' => '5.55',
                      'paymentMethodNonce' => $nonce,
                      'options' => [
                          'submitForSettlement' => True
                    ]
                  ]);
      return response()->json($status);
    }

    public function brainConfig()
    {
      return $gateway = new Braintree_Gateway([
                        'environment' => env('BRAINTREE_ENV'),
                        'merchantId' => env('BRAINTREE_MERCHANT_ID'),
                        'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
                        'privateKey' => env('BRAINTREE_PRIVATE_KEY')
                    ]);
    }

    public function storeSponsor($flatid,$costo) {
      $payment_id = Payment::where('price',$costo)->get();
      $current_timestamp = time();
      $newtime;
      if($costo == 2.99){
        $newtime =86400;
      }else if($costo == 5.99){
        $newtime = 259200;
      }else if($costo == 9.99){
        $newtime =518400;
      }
      $time =$current_timestamp + $newtime;
      $date_from_timestamp = date("Y-m-d H:i:s",$time);



      $Pagamento =DB::table('flat_payment')->insertGetId(
        ['expiration'=>$date_from_timestamp,'flat_id' => $flatid, 'payment_id' => $payment_id[0]->id]
      );


      return redirect('/');
    }
}
