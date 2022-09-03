<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'sub_category';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
