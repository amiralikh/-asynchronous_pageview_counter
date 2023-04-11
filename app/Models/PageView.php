<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasFactory;
    protected $primaryKey = 'ulid';
    public $incrementing = false;
    protected $keyType = 'char';
    protected $fillable = ['ulid', 'url', 'views_count'];
}
