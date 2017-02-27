<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    public $timestamps = false;
    public $table = 'peminjaman';
    public $fillable = ['book_id', 'user_id', 'tgl_pinjam', 'tgl_kembali'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function book()
    {
    	return $this->belongsTo('App\Book');
    }

}
