<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = [
        'name',
        'code',
        'unit',
        'description',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
