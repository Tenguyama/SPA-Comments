<?php

namespace App\Models;

use App\Data\CommentLikeData;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class CommentLike extends Model
{
    use HasFactory, WithData, HasUuids;

    protected $dataClass = CommentLikeData::class;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comment(){
        return $this->belongsTo(Comment::class);
    }
}
