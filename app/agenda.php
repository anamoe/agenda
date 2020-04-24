<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    //
    protected $table = "tabel_agenda";
 protected $fillable = [
       'nama_agenda','keterangan','file'
    ];
}
