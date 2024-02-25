<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Koleksi;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Buku::all();
        return view('list', compact('data'))->with([
            '' => Buku::all(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $bookId = $request->input('book_id');
        $user = Auth::user();
        $book = Buku::findOrFail($request->input('book_id'));

        // dd($book);
        if ($book->status == 0) {
            return redirect()->back()->with('error', 'Book is not available for borrowing.');
        }

        if ($user->peminjaman()->count() >= 5) {
            return redirect()->back()->with('error', 'You have reached the maximum borrowing limit.');
        }

        Peminjaman::create([
            'user_id' => $user->id,
            'buku_id' => $bookId,
            'tanggal_peminjaman' => Carbon::now(),
            'status' => 'dipinjam',
        ]);
        Koleksi::create([
            'user_id' => $user->id,
            'buku_id' => $bookId,
        ]);

        // dd($book);
        $book->save();

        return redirect()->back()->with('success', 'Book borrowed successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $item = Buku::findOrFail($id);
        return view('pinjam.index', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
