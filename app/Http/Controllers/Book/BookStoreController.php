<?php
declare(strict_types=1);

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Service\BookPurchaseService;

class BookStoreController extends Controller
{
    protected $bookPurchaseService;

    public function __construct(BookPurchaseService $bookPurchaseService){
        $this->bookPurchaseService = $bookPurchaseService;
    }

    public function index(){
        $bookTypeList = \App\BookTypeMaster::all();
        return view('book.bookStore')->with(['bookTypeList' => $bookTypeList]);
    }

    public function store(Request $request){

        $this->validator($request->all())->validate();
        $this->bookPurchaseService->purchaseBook($request);

        return redirect('book/store')
          ->with('message', '登録処理が完了しました。');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'book_name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'integer', 'min:1'],
            'author_name' => ['required', 'string', 'max:100'],
        ]);
    }
}
