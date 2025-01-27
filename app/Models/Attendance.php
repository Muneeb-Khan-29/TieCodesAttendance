<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'user_id',
    // ];


    public function employee(){
        return $this->hasOne(Employee::class,'id','user_id');
    }
}
