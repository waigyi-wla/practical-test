<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'question_id',
        'form_setting_id',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }


    public function form_setting()
    {
        return $this->belongsTo(FormSetting::class);
    }
}
