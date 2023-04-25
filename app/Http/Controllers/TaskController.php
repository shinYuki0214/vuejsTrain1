<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;


class TaskController extends Controller
{
    public function store(Request $request)
    {
        Task::create([
            'title' => $request->input('title'),
            'memo' => $request->input('memo'),
        ]);
    }

    public function delete(Request $request)
    {
        $theId = $request->input('id');
        Task::where('id', $theId)->delete();
    }

    public function list()
    {
        return response()->json([
            'tasks' => Task::latest()->get()
        ], Response::HTTP_OK);
    }
    public function edit()
    {
        return response()->json([
            'task' => Task::where('id', '=', '12')->first()
        ], Response::HTTP_OK);
    }
}
