<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Monitoring;

class Monitoringcontroller extends Controller
{
    //
       public function lihat(){
$lihat= Monitoring::all();
 return response()->json([
            'pesan' =>'sukses lah',
            'monitoring' => $lihat

        ],200);
}}
