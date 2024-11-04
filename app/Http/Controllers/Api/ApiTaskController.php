<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class ApiTaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return $tasks->toJson();
    }

    public function store(Request $request){
        $task = Task::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'task created successfully',
            'data' => $task
        ], 201);
    }
}
