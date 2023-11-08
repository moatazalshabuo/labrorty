<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientGroupTest extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', "group_id", 'status','day'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function group()
    {
        return $this->belongsTo(GroupTest::class);
    }
}
