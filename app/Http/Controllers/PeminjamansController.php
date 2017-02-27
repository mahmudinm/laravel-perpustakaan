<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use App\Book;
use App\User;
use Illuminate\Http\Request;

class PeminjamansController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjamans = Peminjaman::all();
        return view('peminjamans.index', compact('peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        $books = Book::pluck('name', 'id');
        return view('peminjamans.create', compact('users', 'books', 'stock'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'books' => 'required',
            'users' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required'
        ]);

        // validasi jika stock buku sudah habis
        $stock = Book::find($request->books);
        if ($stock->stock <= 0 ) {
            flash('Maaf Stock Buku Habis', 'danger');
            return redirect()->back();
        }

        $peminjaman = new Peminjaman;
        $peminjaman->book_id = $request->books;
        $peminjaman->user_id = $request->users;
        $peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $peminjaman->tgl_kembali = $request->tgl_kembali;
        $peminjaman->save();

        $book = Book::find($request->books);
        $book->stock = $book->stock - 1 ; 
        $book->save();

        return redirect()->route('peminjamans.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        $users = User::pluck('name', 'id');
        $books = Book::pluck('name', 'id');
        return view('peminjamans.edit', compact('peminjaman', 'users', 'books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $this->validate($request, [
            'books' => 'required',
            'users' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required'
        ]);

        // validasi jika stock buku sudah habis
        $stock = Book::find($request->books);
        if ($stock->stock <= 0 ) {
            return redirect()->back();
        }

        $peminjaman->update($request->all());
        return redirect()->route('peminjamans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        $book = Book::find($peminjaman->book_id);
        $book->stock = $book->stock + 1 ;
        $book->save() ;
        return redirect()->route('peminjamans.index');
    }
}
