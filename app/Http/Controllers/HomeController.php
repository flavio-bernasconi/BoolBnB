<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flat;
use DB;
class HomeController extends Controller
{


  /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
  */
  public function index(){

    $payments = DB::table('flat_payment')->get();
    $date =strtotime(date("Y-m-d H:i:s",time()));
    $paymentexpiration;
    $flats=[];

    for ($i=0; $i <count($payments) ; $i++) {
      $paymentexpiration = strtotime($payments[$i]->expiration);
      if($paymentexpiration >= $date){
        $flats[]=Flat::findOrFail($payments[$i]->flat_id);
      }
    }

    $flatsrates = Flat::orderBy("rate","desc")->take(6)->get();

    return view('welcome',compact('flats','flatsrates'));




  }
}
