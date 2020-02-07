<?php

namespace App\Http\Controllers;

use App\Priority;
use App\Project;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $tasks = Task::OrderBy("priority_id")->paginate(3);

       // dd($tasks);
        
        return view('home' , compact("tasks" , "projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        $priorities = Priority::all();
        return view('create' , compact("priorities","projects"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            "name" => "required" ,
            "priority" => "required" ,
            "project" => "required"
        ]);

       
        $task = ["name" => $data["name"] , 
                 "priority_id" => $data["priority"] , 
                 "project_id" => $data["project"]
        ];
        Task::create($task);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //dd($task->priority->name);
        $priorities = Priority::all();
        return view('edit' , compact("task" , "priorities"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = request()->validate([
            "name" => "required" ,
            "priority_id" => "required" ,
            
        ]);
        
         Task::find($id)->update($data); 

        return redirect()->route('home');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
        return redirect()->route("home");
    }
}
