@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Authentication Test</div>

                <div class="card-body">
                   @if(Auth::check())
                        <button class="btn btn-success">Success</button>
                    @else
                        <button class="btn btn-danger">Miss</button>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
