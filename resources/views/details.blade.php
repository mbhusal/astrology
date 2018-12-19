@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header"><b>{{$items->title}}</b> posted by <b>{{$items->user->name}}</b> on <b>{{$items->created_at->format('d M y')}}</b></div>

                <div class="card-body">
                    {{$items->description}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
