<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Jogador extends Model
{
    protected $table = 'jogador';
	protected $fillable = ['timeId','alunoId', 'jogando'];

    public function allJogadores(){
        return self::all();
    }
    public function getJogador($id){
        $jogador = self::find($id);
        if(is_null($jogador)){
            return false;
        }
        return $jogador;
    }
    public function saveJogador(){
        $input = Input::all(); 
        $jogador = new Jogador();
        $jogador->fill($input); // associação em massa  
        return $jogador->save();        
    }
    public function updateJogador($id)
    {
        $jogador = self::find($id);
        if(is_null($jogador)){
            return false;
        }
        $input = Input::all();
        $jogador->fill($input); // associação em massa
        $jogador->save();
        return $jogador;
    }
    public function deleteJogador($id)
    {
        $jogador = self::find($id);
        if(is_null($jogador)){
            return false;
        }
        return $jogador->delete();
    }

    public function allJogadoresDoTime($id){
        $jogador = self::where('timeId', $id)->get();
        if(!($jogador)->count()){
            return false;
        }
        return $jogador;
    }
}
