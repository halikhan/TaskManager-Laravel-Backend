<?php
namespace App\Http\Controllers;

use App\Models\DailyTask;
use Illuminate\Http\Request;

class DailyTaskController extends Controller
{
    public function index()
    {
        // Fetch all daily tasks
                return DailyTask::all();
        
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'in:To Do,In Progress,Done',
        ]);

        $task = DailyTask::create($data);
        return response()->json($task, 201);
    }

    public function show($id)
    {
        $dailyTask = DailyTask::find($id);
        if (!$dailyTask) {
            return response()->json(['error' => 'Task not found'], 404);
        }
        return $dailyTask;
    }
    public function update(Request $request, $id)
    {
        $dailyTask = DailyTask::find($id);

        if (!$dailyTask) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        // dd($dailyTask);

            $data = $request->validate([
                'title' => 'sometimes|required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'in:To Do,In Progress,Done',
            ]);

        $dailyTask->update($data);
        return response()->json($dailyTask);
    }

    public function destroy($id)
    {
        $dailyTask = DailyTask::find($id);

        if (!$dailyTask) {
            return response()->json(['error' => 'Task not found'], 404);
        }   
    
        $dailyTask->delete();
        return response()->noContent();
    }
}
