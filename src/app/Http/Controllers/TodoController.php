<?php
namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // すべての ToDo を取得
    public function index()
    {
        return response()->json(Todo::all(), 200);
    }

    // 新しい ToDo を作成
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = Todo::create($request->all());
        return response()->json($todo, 201);
    }

    // 特定の ToDo を取得
    public function show(Todo $todo)
    {
        return response()->json($todo, 200);
    }

    // ToDo を更新
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo->update($request->all());
        return response()->json($todo, 200);
    }

    // ToDo を削除
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(null, 204);
    }
}
