<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class News extends Model
{
protected $fillable = [
    'category_id',
    'image',
    'title',
    'author',
    'created_at',
    'description',
    'status'
];

    public function category() {

        return $this->belongsTo(Category::class, 'category_id');
    }
    public function scopeStatus(\Illuminate\Database\Eloquent\Builder $query) {
        if(request()->has('f')) {
            $query->where('status', request()->query('f', 'draft'));
        }
    }
}
