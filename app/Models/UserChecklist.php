<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChecklist extends Model
{
    use HasFactory;

    protected $table = 'user_checklist';
    protected $fillable = ['nama','auditor','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
