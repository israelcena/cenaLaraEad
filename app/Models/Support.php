<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory, UuidTrait;

    /**
    * Fix Return uuid
    */
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'qa',
        'description',
    ];

    public $qaStatus = [
        'P' => 'pending',
        'Q' => 'question',
        'A' => 'answered',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
