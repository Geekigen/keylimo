<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;
    protected $table='wishlists';
    protected $fillable=['name','price','image','quantity','buyer','product_id'];
}
