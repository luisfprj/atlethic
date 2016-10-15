<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Participante extends Model
{
    protected $table = 'participant';
	protected $fillable = ['alunoId','eventoId'];

    public function allParticipantes(){
        return self::all();
    }
    public function getParticipante($id){
        $participante = self::find($id);
        if(is_null($participante)){
            return false;
        }
        return $participante;
    }
    public function saveParticipante(){
        $input = Input::all(); 
        $participante = new Participante();
        $participante->fill($input); // associação em massa  
        return $participante->save();        
    }
    public function updateParticipante($id)
    {
        $participante = self::find($id);
        if(is_null($participante)){
            return false;
        }
        $input = Input::all();
        $participante->fill($input); // associação em massa
        $participante->save();
        return $participante;
    }
    public function deleteParticipante($id)
    {
        $participante = self::find($id);
        if(is_null($participante)){
            return false;
        }
        return $participante->delete();
    }
}
