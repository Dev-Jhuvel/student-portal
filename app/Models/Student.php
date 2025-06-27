<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Student extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'firstName',
        'lastName',
        'middleName',
        'suffix',
        'birthday',
        'gender',
        'province',
        'city',
        'email',
        'contactNumber',
        'barangay',
        'street',
        'houseNumber',
        'year',
        'course' => 'course_id',
        'semester',
        'schoolYear',
    ];


    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query
                ->where('firstName', 'like', '%' . request('search') . '%')
                ->orWhere('lastName', 'like', '%' . request('search') . '%');
        }

        if ($filters['filter'] ?? false) {
            $query->where([
                ['course_id', '=', $filters['filter']['course']],
                ['year', '=', $filters['filter']['year']]
            ]);
        }

        // if ($sort['sort'] ?? false) {
        //     dd(request('sort'));
        //     $order = request('order') ? 'asc' : 'desc';
        //     $query->orderBy(request('sort'), $order);
        // }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
