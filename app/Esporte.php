<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Esporte extends Model
{
    
   protected $table = 'esporte';
   protected $fillable = ['name'];

   public function allEsportes(){
        return self::all();
    }
    public function getEsporte($id){
        $esporte = self::find($id);
        if(is_null($esporte)){
            return false;
        }
        return $esporte;
    }
    public function saveEsporte(){
        $input = Input::all();  

        $esporte = new Esporte();
        $esporte->fill($input); // associação em massa
        return $esporte->save();        
    }
    public function updateEsporte($id)
    {
        $esporte = self::find($id);
        if(is_null($esporte)){
            return false;
        }
        $input = Input::all();
        $esporte->fill($input); // associação em massa
        $esporte->save();
        return $esporte;
    }
    public function deleteEsporte($id)
    {
        $esporte = self::find($id);
        if(is_null($esporte)){
            return false;
        }
        return $esporte->delete();
    }
}
