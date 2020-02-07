@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Project</div>

                 

                <div class="card-body">
                    <a href=" {{route('home')}} " class="btn btn-primary mb-3"><  Tasks</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                <form action=" {{route('project.store' , ["user_id" , Auth()->user()->id])}} " method="post">
                    <div class="form-group">
                        <div class="col-md-8">
                            <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="project name">
                        @if ($errors->first('name'))
                        <span class="alert alert-danger" > {{$errors->first('name')}} </span>    
                        @endif
                       
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                    @csrf
                </form>
            
               
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
