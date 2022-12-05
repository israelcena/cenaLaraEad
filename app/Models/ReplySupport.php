<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplySupport extends Model
{
    use HasFactory, UuidTrait;
    
      /**
    * Fix Return uuid
    */
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = ['support_id', 'user_id','description'];

    // put $table because the name table is not default
    protected $table = 'reply_support';

    public function support()
    {
      return $this->belongsTo(Support::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

}
