<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\upload;
class uploadcontroller extends Controller
{
  //   //
     	public function upload(){
		$upload = upload::all();
        return response()->json([
            'pesan' =>'sukses lah',
            'upload' => $upload
        ],200);
	// 	 $gambar = upload::get();
	// 	 return view('upload',['gambar' => $gambar]);
	 }
 	public function proses_upload(Request $request){

		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'nama' => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		// $tujuan_upload = 'data_file';
		$tujuan_upload = '../resources/gambar/';
		$file->move($tujuan_upload,$nama_file);
 
		upload::create([
			'file' => $nama_file,
			'nama' => $request->nama,
		]);

 if (file_put_contents($file, base64_decode($file))) {
            $out = [
                "message" => "upload_success",
                "code"    => 201,
            ];
        } else {
            $out = [
                "message" => "upload_gagal",
                "code"   => 404,
            ];
        }
 return response()->json($out, $out['code']);
		// return redirect()->back();

	}
	

}
