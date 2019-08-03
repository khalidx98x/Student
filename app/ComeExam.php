<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComeExam extends Model
{
    public function studentpersonal()
    {
        return $this->hasOne('App\Studentbridging');
    }
}
