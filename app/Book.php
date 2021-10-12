<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;

    protected $fillable = ['name','slug', 'category_id','details','price','description','featured','quantity', 'image','images'];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'books.name' => 10,
            'books.details' => 5,
            'books.description' => 2,
        ],
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    
}
