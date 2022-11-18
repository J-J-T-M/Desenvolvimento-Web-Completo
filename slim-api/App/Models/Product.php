<?php
namespace App\Models;
use illuminate\database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'maker', 'updated_at', 'created_at'
    ];
}

