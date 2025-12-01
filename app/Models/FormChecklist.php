<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormChecklist extends Model
{
    use HasFactory;

    protected $table = 'form_checklist';
    protected $fillable = ['pertanyaan','user_id'];
    public $timestamps = false;
}
