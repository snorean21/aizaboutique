<?php

namespace AizaBoutique;

use Illuminate\Database\Eloquent\Model;
use AizaBoutique\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['image', 'reference', 'category', 'color', 'size', 'description', 'unit_price',
    'price_for_wholesale'];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
