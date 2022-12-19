<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','module_id'];

    public function module(){
        return $this->belongsTo(Module::class);
    }
}
