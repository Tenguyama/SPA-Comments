<?php

namespace App\Models;

use App\Data\UserData;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class User extends Model
{
    use HasFactory, WithData, HasUuids;

    protected $dataClass = UserData::class;

    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public  function commentLike(){
        return $this->hasMany(CommentLike::class);
    }
}
