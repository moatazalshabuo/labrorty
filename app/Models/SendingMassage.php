<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendingMassage extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'message',
        "receiver_id",
        'status_user',
        'status_client',
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }


}
