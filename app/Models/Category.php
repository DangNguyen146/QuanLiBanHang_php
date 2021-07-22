<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Category extends Model
{
    use HasFactory;
    use softDeletes;
    //Tạo bàng delate
    //Them cái use softDeletes
    //Viết code
    protected $fillable=['name', 'parent_id','slug'];
}
