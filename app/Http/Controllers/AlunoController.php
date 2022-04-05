<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;

class AlunoController extends Controller
{
    
    public function index()
    {
        $aluno = new Aluno();
		$alunos = Aluno::All();
		$cursos = Curso::All();
		return view("aluno.index", [
			"aluno" => $aluno,
			"alunos" => $alunos,
			"cursos" => $cursos
		]);
    }

    
    public function store(Request $request)
    {
        if ($request->get("id") != "") {
			$aluno = Aluno::Find($request->get("id"));
		} else {
			$aluno = new Aluno();
		}
		
		$aluno->nome = $request->get("nome");
		$aluno->email = $request->get("email");
		$aluno->curso_id = $request->get("curso_id");
		$aluno->save();
		
		$request->session()->flash("status", "salvo");
		
		return redirect("/aluno");
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
