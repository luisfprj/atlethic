<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
   protected $table = 'team';
   protected $fillable = ['name','logo','esporteId','alunoId','atleticaId'];

    public function allTimes(){
        return self::all();
    }
    public function getTime($id){
        $time = self::find($id);
        if(is_null($time)){
            return false;
        }
        return $time;
    }
    public function saveTime(){
        $input = Input::all();
        $time = new Time();
        $time->fill($input); // associação em massa   
        return $time->save();        
    }
    public function updateTime($id)
    {
        $time = self::find($id);
        if(is_null($time)){
            return false;
        }
        $input = Input::all();
        $time->fill($input); // associação em massa
        $time->save();
        return $time;
    }
    public function deleteTime($id)
    {
        $time = self::find($id);
        if(is_null($time)){
            return false;
        }
        return $time->delete();
    }
}
