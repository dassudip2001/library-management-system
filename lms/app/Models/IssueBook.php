<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
    use HasFactory;
    // student 
    public function students()
    {
        return $this->belongsTo(Student::class, 'studentId', 'id');
    }
    // books

    public function books()
    {
        return $this->belongsTo(Book::class, 'booksId', 'id');
    }
}