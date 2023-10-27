<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prompt extends Model
{
    use HasFactory;


    protected $table = 'prompts';
    protected $primaryKey = 'prompt_id';
    protected $fillable = [
        'prompt',
        'sender',
        'user_id'
    ];
}
