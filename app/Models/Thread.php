<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'first_comment',
        'category_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeSortOrder($query, $sortOrder)
    {
        if($sortOrder === null || $sortOrder == \Constants::SORT_ORDER['later']) {
            return $query->orderBy('threads.created_at', 'desc');
        }
        if($sortOrder == \Constants::SORT_ORDER['older']) {
            return $query->orderBy('threads.created_at', 'asc');
        }
    }

    public function scopeSelectCategory($query, $categoryName)
    {
        if($categoryName !== '0') {
            return $query->where('category_name', $categoryName);
        } else {
            return;
        }
    }

    public function scopeSearchKeyword($query, $keyword)
    {
        if(!is_null($keyword)) {
            $spaceConvert = mb_convert_kana($keyword,'s');
            $keywords = preg_split('/[\s]+/', $spaceConvert,-1,PREG_SPLIT_NO_EMPTY);
            foreach($keywords as $word) {
                $query->where('title','like','%'.$word.'%');
            }
            return $query; 
        } else {
            return;
        }
    }
}
