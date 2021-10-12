<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryBook extends Model
{
    protected $table = 'category_book';

    protected $fillable = ['book_id', 'category_id'];
}
