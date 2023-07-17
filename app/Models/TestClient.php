<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'cgt_id',
        'test_id',
        "result"
    ];
    public function client_group()
    {
        return $this->belongsTo(ClientGroupTest::class,'cgt_id');
    }
    public function client_tests()
    {
        return $this->belongsTo(LabTest::class,"test_id");
    }
}
