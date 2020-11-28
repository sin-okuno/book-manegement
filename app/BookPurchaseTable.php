<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookPurchaseTable extends Model
{
    //
    protected $table = 'book_purchase_table';
    
    protected $primaryKey = 'id';   

    /**
     * 複数代入する属性
     *
     * @var array
     */
    protected $fillable = ['book_name','book_type_id','price','author_name','user_id'];
}
