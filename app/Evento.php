<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
class Evento extends Model
{
    
    protected $table = 'event';
	protected $fillable = ['name','data', 'duracao', 'local','atleticaId','administradorId','informacoes'];

    public function allEventos(){
        return self::all();
    }
    public function getEvento($id){
        $evento = self::find($id);
        if(is_null($evento)){
            return false;
        }
        return $evento;
    }
    public function saveEvento(){
        $input = Input::all(); 
        $evento = new Evento();
        $evento->fill($input); // associação em massa  
        return $evento->save();        
    }
    public function updateEvento($id)
    {
        $evento = self::find($id);
        if(is_null($evento)){
            return false;
        }
        $input = Input::all();
        $evento->fill($input); // associação em massa
        $evento->save();
        return $evento;
    }
    public function deleteEvento($id)
    {
        $evento = self::find($id);
        if(is_null($evento)){
            return false;
        }
        return $evento->delete();
    }
}
