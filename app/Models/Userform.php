<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userform extends Model
{
    use HasFactory;

    protected $table = 'userforms'; // Ensure table name matches

    protected $fillable = [
        'name', 'email', 'contactno', 'adhar', 'state', 'project', 'language',
        'pincode', 'address', 'pancart', 'image', 'resume', 'gender', 'data_of_brth', 'age'
    ];
}    
