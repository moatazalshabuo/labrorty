<?php

use App\Models\SendingMassage;
use App\Models\User;

class Helepers{

    public static function user_name($id){
        return User::find($id)->name;
    }

    public static function countMassage(){
        return count(SendingMassage::where('status_user',1)->get());
    }

    public static function countMassageClient($id){
        return count(SendingMassage::where(['status_client'=>1,"client_id"=>$id])->get());
    }
}

?>
