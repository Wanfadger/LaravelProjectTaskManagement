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

               
                    <form action=" {{route('task.update' , ["id" => $task->id])}} " method="post">
                        @method("put")

                        <div class="form-group col-md-8">
                            <input type="text" name="name" value=" {{$task->name}} " class="form-control " placeholder="task name">
                        <span>{{$errors->first('name')}}</span>
                        </div>

                        <div class="form-group col-md-8">
                            <select name="priority_id" id="priority" class=" form-control">
                                <option disabled selected>select task priority</option>
                                @foreach ($priorities as $priority)
                                <option value=" {{$priority->id}} "  {{ ($task->priority->name==$priority->name) ? "selected" : "" }}   >{{$priority->name}}</option>
                                @endforeach
                           
                            </select>
                        </div>

                        <button class="btn btn-primary ml-auto" type="submit" >Edit</button>

                        @csrf
                    </form>
                  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
