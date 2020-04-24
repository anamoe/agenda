<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\data;
use App\pengguna;
use App\Point;


class pegawaicontroller extends Controller
{
    //
    public function index() {

    return data::all();
    }

    public function create (Request $request){
  
    	$data = new data;
        $data->username = $request->input('username');
    	$data->email = $request->input('email');
        $pas = $request->input('password');
        $data->password = bcrypt($pas);
        $data->role = $request->input('role');
    	$data->save();
        if (($data)) {
            $out = [
                "message" => "register_success",
                "code"    => 201,
            ];
        } else {
            $out = [
                "message" => "failed_register",
                "code"   => 404,
            ];
        }
 
        return response()->json($out, $out['code']);
    }
    	// return "Berhasil";


  public function login(Request $request){
   
        // return data::all();
        
    $logins = DB::table('login')
   ->where('email', $request->input('email'))
   // ->where('password', $request->password)
   ->first();
   if(Hash::check($request->input('password'),$logins->password)){
   $result["success"] = "1";
    $result["message"] = "success";
    //untuk memanggil data sesi Login
    $result["id"] = $logins->id;
    $result["username"] = $logins->username;
    $result["password"] = $logins->password;
    $result["email"] = $logins->email;
    $result["role"] = $logins->role;
    $result["point"] =$logins->point->point;
    return response()->json($result);
   }
 }

 public function nambah(Request $request){
    $pengguna = new pengguna;
        $pengguna->nama = $request->input('nama');
        $pengguna->save();
 }
  public function delok(){
    return pengguna::all();
 }
    }

