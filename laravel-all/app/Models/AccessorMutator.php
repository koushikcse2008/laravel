<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessorMutator extends Model
{
    use HasFactory;
    protected $table = "tbl_contacts";

    public function setUnameAttribute($value)
    {
        $this->attributes["uname"] = ucwords($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes["email"] = ucwords($value);
    }

    public function getEmailAttribute($value)
    {
        return ucwords($value);
    }
}
