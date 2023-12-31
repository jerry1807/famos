<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aifileupload extends Model
{
    protected $table = 'aifileuploads';

    protected $fillable = [
        'name',
        'description',
        'file_path',
        'ai_details',
        'ai_type',
        'scanable_llm',
    ];


}
