<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = ['id','name'];

    public $encrementing = false;
    public $timestamps= false;
    public function getData(){
        return DB::table('category')->get();
    }
}
