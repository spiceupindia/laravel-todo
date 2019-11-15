@extends('layouts.app')
@section('content')

<h1 class="text-center">Single Todo Details</h1>

        <div class="card">
            <div class="card-header">{{ $todo->title }}</div>
                <div class="card-body">
                    <div>{{ $todo->content }}</div>
                    <a class="btn btn-xs btn-primary" href="{{ route('Edit Todo',['id' => $todo->id])}}"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-secondary float-right" href="{{route('Todos')}}">Go Back</a>
            </div>
        </div>

@endsection
