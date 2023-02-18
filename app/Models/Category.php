<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'category';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'description',
    ];

    public function image()
    {
        return $this->belongsTo(Images::class, 'categoryId', 'id');
    }
}
