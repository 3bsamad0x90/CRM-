<?php

namespace Crm\Customer\Models;

use Crm\Customer\Models\Note;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function notes(){
        return $this->hasMany(Note::class);
    }
}
