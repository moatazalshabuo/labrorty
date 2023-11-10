<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ["name","phone","address","created_at",'password',"id"];
    protected $table = 'clients';

    public function massage(){
        return $this->hasMany(SendingMassage::class);
    }

    public function cgt(){
        return $this->hasMany(ClientGroupTest::class);
    }

}
