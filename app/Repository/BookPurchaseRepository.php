<?php
declare(strict_types=1);

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class BookPurchaseRepository implements BookPurchaseRepositoryInterface
{
    public function getBookListForUser(int $id): Collection
    {
        $result = DB::table('book_purchase_table')
            ->join('book_type_master', 'book_purchase_table.book_type_id', '=', 'book_type_master.id')
            ->where('book_purchase_table.user_id', '=', $id)
            ->select(
                    'book_purchase_table.id'
                    ,'book_purchase_table.book_name'
                    , 'book_type_master.type_name'
                    , 'book_purchase_table.author_name'
                    , 'book_purchase_table.price'
                    )
            ->get();
        return $result;
    }


}
