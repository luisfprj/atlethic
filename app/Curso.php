<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Curso extends Model
{
   protected $table = 'course';
   protected $fillable = ['name'];

   public function allCursos(){
        return self::all();
    }
    public function getCurso($id){
        $curso = self::find($id);
        if(is_null($curso)){
            return false;
        }
        return $curso;
    }
    public function saveCurso(){
        $input = Input::all();  

        $curso = new Curso();
        $curso->fill($input); // associação em massa
        return $curso->save();        
    }
    public function updateCurso($id)
    {
        $curso = self::find($id);
        if(is_null($curso)){
            return false;
        }
        $input = Input::all();
        $curso->fill($input); // associação em massa
        $curso->save();
        return $curso;
    }
    public function deleteCurso($id)
    {
        $curso = self::find($id);
        if(is_null($curso)){
            return false;
        }
        return $curso->delete();
    }
}
