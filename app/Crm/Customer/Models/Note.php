<?php

namespace Crm\Customer\Models;

use Crm\Customer\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
