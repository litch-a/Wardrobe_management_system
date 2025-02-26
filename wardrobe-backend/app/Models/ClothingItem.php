<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClothingItem extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'catgory', 'image_url', 'user_id'];
}
