<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Service\BookPurchaseService;

class BookManagementController extends Controller
{
    protected $bookPurchaseService;

    public function __construct(BookPurchaseService $bookPurchaseService){
        $this->bookPurchaseService = $bookPurchaseService;
    }

    public function index(){
        $bookPurchaseList = $this->bookPurchaseService->getBookPurchaseList(Auth::id());
        return view('book.bookManagement')->with(['bookPurchaseList' => $bookPurchaseList]);
    }
}
