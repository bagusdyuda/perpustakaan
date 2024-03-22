<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $bookcount = Book::count();
        $categorycount = Category::count();
        $usercount = User::count();
        $rentlogs = RentLogs::with(['user','book'])->get();
        return view('dashboard', ['book_count' => $bookcount, 'category_count' => $categorycount, 'user_count' => $usercount, 'rent_logs' => $rentlogs]);
    }
}
