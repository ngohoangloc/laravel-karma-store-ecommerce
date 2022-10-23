<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 8306b3a6620a7d08023893795f28df15530dcdf1

class Category extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======
    use SoftDeletes;
>>>>>>> 8306b3a6620a7d08023893795f28df15530dcdf1

    protected $fillable = ['name', 'parent_id', 'slug'];
}
