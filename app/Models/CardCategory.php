<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardCategory extends Model
{
    use HasFactory;

    protected $table = 'card_categories';

    protected $fillable = ['category_id', 'card_code', 'card_id'];
}
