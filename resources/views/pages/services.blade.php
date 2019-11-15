@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $heading }}</div>

                <div class="card-body">
                    <h2>{{ $title }}</h2>
                    @if(count($services) > 0)
                        <ul class="list-group">
                            @foreach($services as $service)
                                <li class="list-group-item">
                                    {{ $service}}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No Services available at the moment</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
