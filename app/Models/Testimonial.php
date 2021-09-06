<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $table = 'testimonials';

    protected $fillable = ['author', 'description', 'image', 'rating', 'sort_order', 'status', 'meta_name', 'meta_keyword', 'meta_description'];
}
