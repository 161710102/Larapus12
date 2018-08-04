<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder; 
use Yajra\DataTables\Datatables; 
use App\Book; 
use Laratrust\LaratrustFacade as Laratrust;

class GuestController extends Controller
{
	public function index(Request $request, Builder $htmlBuilder) 
	{
   if ($request->ajax()) { 
   		$books = Book::with('author'); 
   			return Datatables::of($books) 
   			->addColumn('stock', function($book){ return $book->stock; }) 
   			->addColumn('action', function($book){ 
   				if (Laratrust::hasRole('admin')) return ''; 
   					return '<a class="btn btn-xs btn-primary" href="'.route('guest.books.borrow', $book->id).'">Pinjam</a>'; 
   				})->make(true);
		}

		$html = $htmlBuilder 
		->addColumn(['data' => 'stock', 'name'=>'stock', 'title'=>'Stok', 'orderable'=>false, 'se\ archable'=>false]) 
		->addColumn(['data' => 'title', 'name'=>'title', 'title'=>'Judul']) 
		->addColumn(['data' => 'author.name', 'name'=>'author.name', 'title'=>'Penulis']) 
		->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'se\ 
			archable'=>false]);
return view('guest.index')->with(compact('html'));
}
}

