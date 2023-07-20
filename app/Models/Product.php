<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable =['name','description','brand','cost_price','selling_price','image','total_stock','minimum_stock'];
    use HasFactory;
}
