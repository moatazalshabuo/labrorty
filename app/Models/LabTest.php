<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'descripe',
        'group_id',
        'unit',
        "normal_form",
        'normal_to'
    ];
    protected $table = 'tests';
    public function group()
    {
        return $this->belongsTo(GroupTest::class);
    }
}
