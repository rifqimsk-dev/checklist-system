<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory;

    protected $table = 'summary';
    protected $fillable = ['user_id','user_checklist_id','proses','pi','ca','dealer_id','bulan'];

    public function userchecklist()
    {
        return $this->belongsTo(UserChecklist::class, 'user_checklist_id');
    }

    public function dealer()
    {
        return $this->belongsTo(Dealer::class, 'dealer_id');
    }
}
