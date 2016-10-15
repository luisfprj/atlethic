<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Administrador extends Model
{
  protected $table = 'administrator';
   protected $fillable = ['alunoId'];

   public function allAdministradores(){
        return self::all();
    }
    public function getAdministrador($id){
        $administrador = self::find($id);
        if(is_null($administrador)){
            return false;
        }
        return $administrador;
    }
    public function saveAdministrador(){
        $input = Input::all();  

        $administrador = new Administrador();
        $administrador->fill($input); // associação em massa
        return $administrador->save();        
    }
    public function updateAdministrador($id)
    {
        $administrador = self::find($id);
        if(is_null($administrador)){
            return false;
        }
        $input = Input::all();
        $administrador->fill($input); // associação em massa
        $administrador->save();
        return $administrador;
    }
    public function deleteAdministrador($id)
    {
        $administrador = self::find($id);
        if(is_null($administrador)){
            return false;
        }
        return $administrador->delete();
    }
}
