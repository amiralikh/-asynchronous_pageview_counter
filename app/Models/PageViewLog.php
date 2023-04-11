<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageViewLog extends Model
{
    use HasFactory;
    protected $primaryKey = 'ulid';
    public $incrementing = false;
    protected $keyType = 'char';
    protected $fillable = ['ulid', 'url', 'user_id'];
}
