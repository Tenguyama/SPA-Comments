<?php

namespace App\Models;

use App\Data\CommentData;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class Comment extends Model
{
    use HasFactory, WithData, HasUuids;

    protected $dataClass = CommentData::class;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public  function commentLike(){
        return $this->hasMany(CommentLike::class);
    }

    public function attachment(){
        return $this->hasMany(Attachment::class);
    }
}
