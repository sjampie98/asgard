<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'images';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'path',
        'sort',
        'categoryId',
    ];

    public function categories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class, 'id', 'categoryId');
    }
}
