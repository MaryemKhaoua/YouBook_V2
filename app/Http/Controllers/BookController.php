<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\services\BookService;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $books = Book::all();
      return view('books.index', compact('books'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function addBook()
  {
    return view('books.create');
  }

    /**
     * Store a newly created resource in storage.
     */

    
     public function store(Request $request)
     {
         $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'required|string|max:700',
         ]);
         
         if (!BookService::checkBook($request->input('title'))) {
          return redirect()->back()->withErrors(['title' => 'book deja kayn']);
      }

         Book::create([
             'title' => $request->input('title'),
             'description' => $request->input('description'),
             'created_at' => now(),
             'updated_at' => now(),
         ]);
     
         return redirect()->route('books.index')
             ->with('success', 'Book created successfully.');
     }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('books.show', compact('book'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      $book = Book::find($id);
      return view('books.edit', compact('book'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
      ]);
      $book = Book::find($id);
      $book->update($request->all());
      return redirect()->route('books.index')
        ->with('success', 'book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $book = Book::find($id);
      $book->delete();
      return redirect()->route('books.index')
        ->with('success', 'book deleted successfullyyy');
    }

    public function reserve($id)
    {
        $reservation = new Reservation();
        $reservation->book_id = $id;
        $reservation->user_id = Auth::id(); 
        $reservation->save();
    
        return redirect()->route('books.index')->with('success', 'Livre réservé avec succès.');
    }
    public function getReservation(){
      $reservation = Reservation::where('user_id', Auth::id())->get();

      return view ('books.reservation', ['reservation'=>$reservation]);
    }
       
}
