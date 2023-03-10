<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuthorDetail extends Model
{
    use HasFactory;

    // ID以外を主キーにしている場合は$primaryKeyを定義する
    protected $primaryKey = 'author_id';

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
