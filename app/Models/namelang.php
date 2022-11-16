<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class namelang extends Model
{
    use HasFactory;
    protected $table='namelangs';
    protected $fillable=['name','language'];
}
