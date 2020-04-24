<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hadiah;
class hadiahcontroller extends Controller
{
    //
    	public function tambahhadiah(Request $request){

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->input('file');
		$nama_file = time().".jpeg";
		// $tujuan_upload = '../resource/gambar/';
			$tujuan_upload = 'hadiah/';

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

		Hadiah::create([
			'file' => $nama_file,
			'nama_hadiah' => $request->input('nama_hadiah'),
			'deskripsi' => $request->input('deskripsi'),
			'point_id'	=> $request->input('point_id')
		]);


  return response()->json($response);
		 // return redirect()->back();

	}

	public function hapushadiah($id){
			DB::table('tabel_hadiah')->where('id',$id)->delete();

			return 'sukses';
		

	}
}
