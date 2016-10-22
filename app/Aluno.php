<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Contracts\Auth\Authenticatable;
use Hash;

class Aluno extends Model implements Authenticatable
{
    protected $hidden = ['senha'];
    protected $table = 'student';
    protected $fillable = ['fullName','matricula','email','senha','telefone','turno','cursoId'];

    public function allAlunos(){
        return self::all();
    }
    public function getAluno($id){
        $aluno = self::find($id);
        if(is_null($aluno)){
            return false;
        }
        return $aluno;
    }
    public function saveAluno(){
        $input = Input::all();
        $input['senha'] = Hash::make($input['senha']);
        $aluno = new Aluno();
        $aluno->fill($input); // associação em massa

        $matricula = self::lists('matricula')->all();
        foreach ($matricula as $key => $value) {
            if($value == $input['matricula']){
                return false;
            }
        }
        $email = self::lists('email')->all();
        foreach ($email as $key => $value) {
            if($value == $input['email']){
                return false;
            }
        }   

        return $aluno->save();        
    }
    public function updateAluno($id)
    {
        $aluno = self::find($id);
        if(is_null($aluno)){
            return false;
        }
        $input = Input::all();
        $aluno->fill($input); // associação em massa
        $aluno->save();
        return $aluno;
    }
    public function deleteAluno($id)
    {
        $aluno = self::find($id);
        if(is_null($aluno)){
            return false;
        }
        return $aluno->delete();
    }

    public function getAuthIdentifierName(){
        return "id";
    }
    public function getAuthIdentifier(){
        return $this->id;
    }
    public function getAuthPassword(){
        return $this->senha;
    }
    public function getRememberToken(){
        return;
    }
    public function setRememberToken($value){
        return;
    }
    public function getRememberTokenName(){
        return;
    }
}
