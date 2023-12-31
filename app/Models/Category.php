<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'created_at',
        'updated_at',
    ];
    public function news() {

        return $this->hasMany(News::class, 'category_id');
    }
}
