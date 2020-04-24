<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\animasi;

class animasicontroller extends Controller
{

    //
	public function lihatanimasi(){
		$upload = animasi::all();
        return response()->json([
            'pesan' =>'sukses lah',
            'upload' => $upload
        ],200);
		// $gambar = upload::get();
		// return view('upload',['gambar' => $gambar]);
	}
 
	public function tambahanimasi(Request $request){

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->input('file');
		$nama_file = time()."_".".jpeg";
		// $tujuan_upload = '../resource/gambar/';
			$tujuan_upload = 'animasi/';

 if (file_put_contents($tujuan_upload . $nama_file , base64_decode($file))) {
        // code...
        $response['code'] =1;
        $response['msg'] ="Sukses";
        echo "Sukses Photo" . $response['msg'];
      } else {
        // code...
        $response['code'] =0;
        $response['msg'] ="error";
      }

		animasi::create([
			'file' => $nama_file,
			'nama_konten' => $request->input('nama_konten'),
			'deskripsi' =>$request->input('deskripsi'),
		]);


  return response()->json(['code']);
		 // return redirect()->back();

	}


}
