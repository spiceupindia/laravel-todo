@extends('layouts.app')
@section('content')

        <div class="card">
            <div class="card-header">Todos</div>
            <div class="card-body">
                @if(count($todos) > 0)
                <ul class="list-group">
                    @foreach($todos as $todo)
                        <li class="list-group-item" >
                            {{ $todo->title }}
                            <a class="btn btn-xs btn-danger float-right" href="{{ route('Delete Todo',['id' => $todo->id])}}"><i class="far fa-trash-alt"></i></a>
                            
                            <a class="btn btn-xs btn-primary float-right mr-2" href="{{ route('View Todo',['id' => $todo->id])}}"><i class="fas fa-eye"></i></a>

                            @if($todo->finished)
                                <a class="btn btn-xs btn-success float-right mr-2" href="#"><i class="fas fa-check-circle"></i></a>
                            @else
                                <a class="btn btn-xs btn-dark float-right mr-2" href="{{ route('Finished',['id' => $todo->id])}}"><i class="fas fa-times-circle"></i></a>
                            @endif
                        </li>
                    @endforeach
                </ul>
                @else
                    <p class="text-center">No Todos found.</p>
                @endif
            </div>
        </div>

@endsection
