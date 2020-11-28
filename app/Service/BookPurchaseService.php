<?php
declare(strict_types=1);

namespace App\Service;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repository\BookPurchaseRepositoryInterface;
use App\BookPurchaseTable;

class BookPurchaseService
{
    protected $bookPurchaseRepository;

    public function __construct(BookPurchaseRepositoryInterface $bookPurchaseRepository)
    {
        $this->bookPurchaseRepository = $bookPurchaseRepository;
    }
    
    public function getBookPurchaseList(int $id): Collection
    {
        return $this->bookPurchaseRepository->getBookListForUser($id);
    }

    public function purchaseBook(Request $request)
    {
        BookPurchaseTable :: create([
                'book_name' => $request->input('book_name'),
                'book_type_id' => $request->input('bookType'),
                'price' => $request->input('price'),
                'author_name' => $request->input('author_name'),
                'user_id' => Auth::id(),
            ]);

    }
}
