<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Point;
use App\Hadiah;
use App\masyarakat;
class penukaran extends Controller
{
    //
     public function poinku(){
    return Point::all();
 }
  public function hadiahku(Request $request){
    $hadiahku= Hadiah::all();
    // $point_id=$request->input('point_id');
    // $hadiahku= Hadiah::all('point_id',$point_id)->get();

    foreach ($hadiahku as $value) {
        $array[]=[
            'Hadiah'=> $value->nama_hadiah,
            'point' => $value->point->point
        ];
    //     # code...''
    // $hadiahku= Hadiah::with(['point'])->get();
        // $h = hadiah::get('point_id');
        // $h->load('point:id,point');
     }
     // return response()->json($h);
     //    $hadiahk = Hadiah::findOrFail(29);
     //    dd($hadiahk->point->point);
     return response()->json([
         'pesan' =>'sukses lah',
            'upload' => $array
        ],200);

 }

   public function masyarakatku(){
    // return masyarakat::all();
    // $hadiahs = Hadiah::all();
    // // $masyarakat=masyarakat::first();
    // // $hadiahs->hadiah->nama_hadiah;
   $m = masyarakat::with(['point','hadiah'])->get();

       return response()->json([
         'pesan' =>'sukses lah',
            'upload' => $m
        ],200);
    //  return $hadiahs;
}
}
