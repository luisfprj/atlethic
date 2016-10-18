<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use App\Aluno;
use App\Time;
use App\Esporte;
use App\Capitao;
use App\Jogador;
use App\Administrador;
use Illuminate\Support\Facades\Mail;

class Inscricao extends Model
{
    protected $table = 'application';
	protected $fillable = ['alunoId','timeId', 'status'];

    public function allInscricoes(){
        return self::all();
    }
    public function getInscricao($id){
        $inscricao = self::find($id);
        if(is_null($inscricao)){
            return false;
        }
        return $inscricao;
    }
    public function saveInscricao(){
        $input = Input::all(); 
        $inscricao = new Inscricao();
        $inscricao->fill($input); // associação em massa  
        $inscricao->status="Aguardando";
        $time = new Time();
        $time = $time->getTime($inscricao->timeId);

        $aluno = new Aluno();
        $aluno = $aluno->getAluno($inscricao->alunoId);


        $capitao =  new Capitao();
        $capitoes = $capitao->allCapitoes();

        for($i = 0; $i < count($capitoes); $i++){
            $capitao = $capitoes[$i];
            $administrador = new Administrador();
            $administrador = $administrador->getAdministrador($capitao->administradorId);
            $capAluno = new Aluno();
            $capAluno = $capAluno->getAluno($administrador->alunoId);
            if($capitao->esporteId == $time->esporteId)
            {
                $data = array(
                    'aluno' => $aluno->fullName,
                    'time' => $time->name,
                );

                Mail::send('avisoInscricao', $data, function ($message) use ($capAluno) {
                    $message->from('kapeite@gmail.com', 'Atletica');

                    $message->to($capAluno->email)->subject('Nova inscricao');
                });
            }
        }

        return $inscricao->save();        
    }
    public function updateInscricao($id)
    {
        $inscricao = self::find($id);
        if(is_null($inscricao) || $inscricao->status != 'Aguardando'){
            return false;
        }
        $input = Input::all();
        $inscricao->fill($input); // associação em massa
        $naoExisteJogador = Jogador::where('alunoId',$inscricao->alunoId)->where('timeId',$inscricao->timeId)->count() == 0;

        if($inscricao->status=="Aprovado" && $naoExisteJogador){
            $jogador = new Jogador();
            $jogador->alunoId = $inscricao->alunoId;        
            $jogador->timeId = $inscricao->timeId;
            $jogador->jogando = 1;
            $jogador->save();
        }
        $aluno = new Aluno();
        $aluno = $aluno->getAluno($inscricao->alunoId);
        $time = new Time();
        $time = $time->getTime($inscricao->timeId);
        if($inscricao->status != 'Aguardando'){
          $data = array(
                'aluno' => $aluno->fullName,
                'time' => $time->name,
            );
            if($inscricao->status == 'Aprovado') {
                Mail::send('feedbackInscricaoAprovado', $data, function ($message) use ($aluno, $time) {
                    $message->from('kapeite@gmail.com', 'Atletica');

                    $message->to($aluno->email)->subject('Bem-vindo a ' . $time->name);
                });
            } else {
                Mail::send('feedbackInscricaoNegado', $data, function ($message) use ($aluno) {
                    $message->from('kapeite@gmail.com', 'Atletica');

                    $message->to($aluno->email)->subject('Se fudeu');
                });
            }
        }
        $inscricao->save();
        return $inscricao;
    }
    public function deleteInscricao($id)
    {
        $inscricao = self::find($id);
        if(is_null($inscricao)){
            return false;
        }
        return $inscricao->delete();
    }
}
