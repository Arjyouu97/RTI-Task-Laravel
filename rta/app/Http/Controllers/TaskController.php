<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Yajra\DataTables\DataTables;


class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index');
    }

    public function getTasks(Request $request)
    {

        //  dd($request->all());


        if ($request->ajax()) {
            $query = Task::query();

            if ($request->filled('status')) {
                $query->where('status', $request->status);
            }

            if ($request->filled('due_date')) {
                $query->whereDate('due_date', $request->due_date);
            }

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    return view('tasks.partials.actions', compact('row'))->render();
                })
                ->editColumn('status', fn($row) => ucfirst(str_replace('_', ' ', $row->status)))
                ->editColumn('due_date', fn($row) => $row->due_date ?? 'N/A')
                ->rawColumns(['actions'])
                ->make(true);
        }
    }



    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created.');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.partials.edit-form', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted.');
    }
}
