@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                 

                <div class="card-body">
                    <a href=" {{route('project.create')}} " class="btn btn-primary mb-3">Add Project</a>
                    
                    <form action=" route('project.tasks') " method="post">
                       <div class="form-group col-md-4">
                           <label for="project">Select project to display its task list</label>
                        <select name="project" id="project" class="form-control">
                            <option selected disabled>select project</option>
                            @if ($projects == null)
                            <option selected disabled>Please create a project</option>
                            @endif

                            @foreach ($projects as $project)
                            <option value=" {{$project->id}} "> {{$project->name}} </option> 
                            @endforeach
                           
                        </select>
                       </div>
                       @csrf
                    </form>

                    <a href=" {{route('task.create')}} " class="btn btn-primary mb-3">Add Task</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div style="display:hidden">
                       <h4>Project Tasks</h4>
                       <ul id="ul">
    
                      </ul>
                   </div>

                    <table class=" table">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>priority</th>
                                <th>action</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">

                            @foreach ($tasks as $task)
                            <tr >
                                <td>{{$task->name}} </td>
                                    <td>{{$task->priority->name}}</td>
                                    <td>
                                        <a href=" {{route("task.edit" , ["task"=>$task->id])}} " class="btn btn-success">edit</a>
                                        <form action=" {{route('task.delete' , ["id"=>$task->id])}} " method="post">
                                        @csrf
                                        @method("delete")
                                        <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </td>
                                </tr>  
                            @endforeach

                         
                        </tbody>
                    </table>

                    <div> {{$tasks->links()}} </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('custom-js')
   <script>
       var projectSelect = document.querySelector('#project');
       var ul = document.querySelector('#ul')

       document.addEventListener('click' , (event)=>{
     
        let projectId = projectSelect.value 
        

         axios.get(`/project/tasks/${projectId.trim()}`)
         .then( (response)=>{
             var tasks = response.data
             ul.innerHTML = '';
             if(tasks.length > 0){
                displayResponseData(tasks); 
             }else{
                ul.innerHTML = '';
             }
           
         } )
         .catch( (error)=>{
             console.log(error)
         } )

       })


       function displayResponseData(tasks){
            
           for(i=0 ; i<tasks.length ; i++){
            var li = document.createElement('li')
            li.innerHTML = tasks[i].name
            ul.appendChild(li)
           }

       }

   </script>
@endsection