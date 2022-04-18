<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class TodoListController
 * @package App\Http\Controllers
 */
class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todoLists = TodoList::paginate();

        return view('todo-list.index', compact('todoLists'))
            ->with('i', (request()->input('page', 1) - 1) * $todoLists->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $todoList = new TodoList();
        $usuarios = User::pluck('name', 'id');
        return view('todo-list.create', compact('todoList','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TodoList::$rules);

        $todoList = TodoList::create($request->all());

        return redirect()->route('todo-lists.index')
            ->with('success', 'TodoList created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todoList = TodoList::find($id);

        return view('todo-list.show', compact('todoList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todoList = TodoList::find($id);
        $usuarios = User::pluck('name', 'id');
        return view('todo-list.edit', compact('todoList','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TodoList $todoList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TodoList $todoList)
    {
        request()->validate(TodoList::$rules);

        $todoList->update($request->all());

        return redirect()->route('todo-lists.index')
            ->with('success', 'TodoList updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $todoList = TodoList::find($id)->delete();

        return redirect()->route('todo-lists.index')
            ->with('success', 'TodoList deleted successfully');
    }
}
