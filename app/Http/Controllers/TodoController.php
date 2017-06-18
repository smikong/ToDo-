<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    protected function validator(array $request)
    {
        return Validator::make($request, [
            'todo' => 'required',
        ]);
    }

    public function index(Request $request)
    {
        $s = $request->input('s');
        $result = Auth::user()->todo()
            ->search($s)
            ->get();
        if(!$result->isEmpty()){
            return view('todo.dashboard',['todos'=>$result], compact('s'));
        }else{
            return view('todo.dashboard',['todos'=>false]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.addtodo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        //nem lehet ugyan az a címe egy másik teendőnek
        $this->validate($request,[
            'todo'=>'required|unique:todo'
        ]);
        if(Auth::user()->todo()->Create($request->all())){
            return $this->index($request);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todo.todo',['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */

    public function edit(Todo $todo)
    {
        return view('todo.edittodo',['todo' => $todo]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $this->validator($request->all())->validate();
        if($todo->fill($request->all())->save()){
            return $this->show($todo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return back();
    }




}
