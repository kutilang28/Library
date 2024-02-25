<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Koleksi;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all Peminjaman records associated with the authenticated user
        $userId = auth()->user()->id;
        
        // Fetch koleksi records associated with the user
        $peminjamans = Peminjaman::where('user_id', $userId)->with('buku')->get();
        
        // Initialize an empty array to store books
        $books = [];
        
        // Loop through each Peminjaman record
        foreach ($peminjamans as $peminjaman) {
            // Retrieve the book associated with the Peminjaman record
            $book = $peminjaman->buku;
            
            // Add the book to the books array if it's not null
            if ($book) {
                $books[] = $book;
            }
        }
    
        // dd($books); // Uncomment this line for debugging
        
        // Pass the data to the view
        return view('pinjam.kembali', compact('books', 'peminjamans'));
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
        $borrowing = Peminjaman::findOrFail($request->input('return_id'));
        $borrowing->tanggal_pengembalian = Carbon::now();
        $borrowing->save();

        // $book = $borrowing->book;
        // $book->is_available = true;
        // $book->save();

        return redirect()->back()->with('success', 'Book returned successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
