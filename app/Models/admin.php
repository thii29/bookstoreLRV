<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $table='admin';
    protected $primaryKey='id';
    protected $keytype='int';
    protected $fillable=['fullname'];
    
    public $encrementing = true;
    public $timestamps= false;
}
