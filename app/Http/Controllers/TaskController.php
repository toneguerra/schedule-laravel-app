<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    
    public function index(){
        //$tasks = Task::all();
        $tasks = Task::where('user_id', '=', Auth::id())->get();

        $txtSrc = '';
        return view('task.index', compact(['tasks', 'txtSrc']));
    }

    public function create(){
        return view('task.create');
    }

    public function store(Request $request){
        $rules = [
            'description' => 'required|min:5',
            'date' =>'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){

            return redirect()->route('task.create')->withInput()->withErrors($validator);
        }

        /*
        $request->request->add(['user_id' => Auth::id()]);
        Task::create($request->all());
        */


        Task::create(
            [
                'description' => $request->description,
                'date' => $request->date,
                'user_id' => Auth::id(),
            ]
        );

        
        return redirect('/task')->with('success', 'Tarefa adicionada com sucesso!');;
    }

    public function destroy($id){

        $task = Task::findOrFail($id);

        if (!Gate::allows('is-owner', $task)) {
            //abort(403);
            return redirect('/task')->with('error', 'Você não pode excluir uma tarefa que não é sua!');
        }

        $task->delete();

        return redirect('/task')->with('success', 'Tarefa excluida com sucesso');
    }

    public function edit($id){

        $task = Task::findOrFail($id);

        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id){
        $task = Task::findOrFail($id);
        
        if (!Gate::allows('is-owner', $task)) {
            //abort(403);
            return redirect('/task')->with('error', 'Você não pode editar uma tarefa que não é sua!');
        }

        $rules = [
            'description' => 'required|min:5',
            'date' =>'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){

            return redirect()->route('task.create')->withInput()->withErrors($validator);
        }

        $task->update($request->all());

        return redirect('/task')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function search(Request $request){
        $tasks = Task::where('description','LIKE',"%{$request->description}%")->get();
        $txtSrc = $request->description;
        
        return view('task.index', compact(['tasks','txtSrc']));
    }
}
