<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\softDeletes;

class Product extends Model
{
    use HasFactory;
    use softDeletes;
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    /**
     * The roles that belong to the Product
     *
     */
    public function tags(): BelongsToMany //Quan hệ nhiều nhiều
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id','tag_id');
    }
    /**
     * Get the user that owns the Product
     *
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');//khóa ngoại
    }
    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
