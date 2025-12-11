<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsiChecklist extends Model
{
    use HasFactory;

    protected $table = 'isi_checklist';
    protected $fillable = ['user_id','nama','hondaID','pertanyaan','indikator','keterangan','dealer','bulan','user_checklist_id'];
}
