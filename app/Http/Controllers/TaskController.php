<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;
class TaskController extends Controller
{
    public function index()
    {
        // dd("sd");
        $tasks = Task::all();

        return response()->json($tasks);
        //$value = Yaml::parseFile('mfund.yaml');
        //json_decode($value)
        //return $value;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $task = Task::create($request->all());

        return response()->json([
            'message' => 'Great success! New task created',
            'task' => $task
        ]);
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
           'title'       => 'nullable',
           'description' => 'nullable'
        ]);

        $task->update($request->all());

        return response()->json([
            'message' => 'Great success! Task updated',
            'task' => $task
        ]);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json([
            'message' => 'Successfully deleted task!'
        ]);
    }
}
