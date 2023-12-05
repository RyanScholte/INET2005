<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['title', 'description', 'price', 'quantity', 'SKU', 'picture', 'category_id'];

    // Define the relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}