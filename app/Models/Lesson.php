<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory, UuidTrait;

        /**
    * Fix Return uuid
    */
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'video'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
