<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Message;
use App\Flat;
use App\Detail;
use DB;


class MessageController extends Controller
{


    public function messageStore(Request $request, $id)
    {
      $dataMessage = request()->validate([
        'email' => 'required|email',
        'msg' => 'required'
      ]);

      $dataMessage['flat_id'] = $id;

      $message = new Message;


      $message->fill($dataMessage);
      $message = Message::create($dataMessage);


      return redirect('flat/' . $id)->with('il messaggio è stato inviato');
    }


    public function messageShow($id)
    {
      $log = Auth::user()->id;
      if ($id != Auth::user()->id ) {
        return redirect("showmesg/$log");
      }
      $messages = DB::table('flats')
      ->join('messages','flat_id', '=', 'flats.id')
      ->where('user_id', '=', $id)
      ->orderBy('messages.created_at')
      ->get();
      $flat=[];
      foreach ($messages as $message ) {
        $flat []= Flat::findOrFail($message ->flat_id);
      }

      return view('mymesg', compact('messages','flat'));
    }





}
