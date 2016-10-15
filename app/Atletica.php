<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Atletica extends Model
{
	protected $table = 'atletica';
	protected $fillable = ['name','logo','administradorId','descricao'];

    public function allAtleticas(){
        return self::all();
    }
    public function getAtletica($id){
        $atletica = self::find($id);
        if(is_null($atletica)){
            return false;
        }
        return $atletica;
    }
    public function saveAtletica(){
        $input = Input::all(); 
        $atletica = new Atletica();
        $atletica->fill($input); // associação em massa  
        return $atletica->save();        
    }
    public function updateAtletica($id)
    {
        $atletica = self::find($id);
        if(is_null($atletica)){
            return false;
        }
        $input = Input::all();
        $atletica->fill($input); // associação em massa
        $atletica->save();
        return $atletica;
    }
    public function deleteAtletica($id)
    {
        $atletica = self::find($id);
        if(is_null($atletica)){
            return false;
        }
        return $atletica->delete();
    }
}
