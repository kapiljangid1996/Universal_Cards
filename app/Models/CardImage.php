<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardImage extends Model
{
    use HasFactory;

    protected $table = 'card_images';

    protected $fillable = ['image_type', 'image_caption', 'image', 'card_id'];
}
