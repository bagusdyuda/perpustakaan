<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\RentLogs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class BookRentController extends Controller
{
    public function index(){
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('book-rent', ['users' => $users, 'books' => $books]);
    }

    public function store(Request $request){
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');

        if($book['status'] != 'in stock'){
            Session::flash('message', 'Stok Tidak Ada, Karena Buku Telah Dipinjam');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        }
        else {
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_retrun_date', null)->count();

            if($count >= 3){
                Session::flash('message', 'Tidak Bisa Meminjam, Batas Maksimal Meminjam Tiga Buku');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            }
            else{
                try {
                    DB::beginTransaction();
                    // proses memasukkan ke rent_logs table
                    RentLogs::create($request->all());
                    // proses update book_table
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not available';
                    $book->save();
                    DB::commit();

                    Session::flash('message', 'Buku Berhasil Dipinjam');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('book-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function returnBook(){
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('return-book', ['users' => $users, 'books' => $books]);
    }

    public function saveReturnBook(Request $request){
        // user & buku yang dipilih untuk direturn benar, maka berhasil return book
        // user & buku yang dipilih untuk direturn salah, maka muncul error notice
        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_retrun_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();

        if($countData == 1) {
            // kta akan return buku
            $rentData->actual_retrun_date = Carbon::now()->toDateString();
            $rentData->save();

            Session::flash('message', 'Buku berhasil dikembalikan');
            Session::flash('alert-class', 'alert-success');
            return redirect('book-return');
        }
        else {
            // error notice muncul
            Session::flash('message', 'Kesalahan Data Pinjam');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-return');
        }
    }
}
