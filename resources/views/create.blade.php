@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                 

                <div class="card-body">
                    <a href=" {{route('home')}} " class="btn btn-primary mb-3">tasks</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

               
                    <form action=" {{route('task.store')}} " method="post">

                        <div class="form-group col-md-8">
                            <label for="project">Project</label>
                            <select name="project" id="project" class="form-control">
                                @foreach ($projects as $project)
                                <option value=" {{$project->id}} "> {{$project->name}} </option>    
                                @endforeach
                               
                            </select>
                            @if ($errors->first('project'))
                            <span class="alert alert-danger" > {{$errors->first('project')}} </span>    
                            @endif
                           </div>

                        <div class="form-group col-md-8">
                            <label for="name" >Name</label>
                            <input type="text" id="name" name="name"  class="form-control " placeholder="task name">
                            @if ($errors->first('name'))
                        <span class="alert alert-danger" > {{$errors->first('name')}} </span>    
                        @endif
                        
                        </div>

                        <div class="form-group col-md-8">
                            <label for="priority">priority</label>
                            <select name="priority" id="priority" class=" form-control">
                                <option disabled selected>select task priority</option>
                                @foreach ($priorities as $priority)
                                <option value=" {{$priority->id}} ">{{$priority->name}}</option>
                                @endforeach
                           
                            </select>
                            @if ($errors->first('priority'))
                            <span class="alert alert-danger" > {{$errors->first('priority')}} </span>    
                            @endif
                    
                        </div>

                        <button class="btn btn-primary ml-auto" type="submit" >Add</button>

                        @csrf
                    </form>
                  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
