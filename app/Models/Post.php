<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $guarded = false;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'isActive',
        'slug',
        'preview_image',
        'order',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
