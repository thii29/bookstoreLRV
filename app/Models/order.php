<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $primaryKey = 'idorder';
    protected $keyType = 'int';

    public $encrementing = false;
    public $timestamps= false;
}
