<?php

namespace App\Models;

use App\Data\AttachmentData;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class Attachment extends Model
{
    use HasFactory, WithData, HasUuids;

    protected $dataClass = AttachmentData::class;

    protected $guarded = [];

    public function comment(){
        return $this->belongsTo(Comment::class);
    }
}
