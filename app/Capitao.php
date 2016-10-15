<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Capitao extends Model
{
     
   protected $table = 'captain';
   protected $fillable = ['administradorId','esporteId'];

   public function allCapitoes(){
        return self::all();
    }
    public function getCapitao($id){
        $capitao = self::find($id);
        if(is_null($capitao)){
            return false;
        }
        return $capitao;
    }
    public function saveCapitao(){
        $input = Input::all();  

        $capitao = new Capitao();
        $capitao->fill($input); // associação em massa
        return $capitao->save();        
    }
    public function updateCapitao($id)
    {
        $capitao = self::find($id);
        if(is_null($capitao)){
            return false;
        }
        $input = Input::all();
        $capitao->fill($input); // associação em massa
        $capitao->save();
        return $capitao;
    }
    public function deleteCapitao($id)
    {
        $capitao = self::find($id);
        if(is_null($capitao)){
            return false;
        }
        return $capitao->delete();
    }
}
