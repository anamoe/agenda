<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\feedback;

class feedbackcontroller extends Controller
{

	public function lihatfeedback(){
		$upload = feedback::all();
        return response()->json([
            'pesan' =>'sukses lah',
            'upload' => $upload
        ],200);
		// $gambar = upload::get();
		// return view('upload',['gambar' => $gambar]);
	}
 
	public function tambahfeedback(Request $request){

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->input('file');
		$nama_file = time()."_".".jpeg";
		// $tujuan_upload = '../resource/gambar/';
			$tujuan_upload = 'feedback/';

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

		feedback::create([
			'file' => $nama_file,
			'nama' => $request->input('nama'),
			'komentar' => $request->input('komentar'),
		]);


  return response()->json($response);
		 // return redirect()->back();

}
}
