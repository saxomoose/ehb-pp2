<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
   public $fillable = ['title', 'language', 'date', 'issuer', 'category', 'keyword'];
}
