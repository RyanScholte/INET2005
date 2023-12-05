<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    // Define the inverse relationship with Item
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
