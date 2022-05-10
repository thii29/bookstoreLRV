<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class book extends Model
{
    use HasFactory;
    protected $table='book';
    protected $primaryKey='idbook';
    protected $keytype='string';
    protected $fillable =['idbook','namebook','id_category','detailbook',
                        'description','price','price_saleoff','quantity','image','status'];

    public $encrementing = false;
    public $timestamps= false;

    public function category(){
        return $this->belongsTo(category::class,'id_category','id');
    }
    public function getData(){
        return DB::table('book')->get();
    }
    public function getDetail($id){
        return DB::table('book')->where('idbook',$id);
    }
}
