<?php
declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookTypeMaster extends Model
{
    //
    protected $table = 'book_type_master';
    
    protected $primaryKey = 'id';   
}