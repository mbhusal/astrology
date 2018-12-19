@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
<div class="row">
        <div class="col-md-9">

            <div class="card">
                <div class="card-header">{{$data['archive_name']}}</div>

                <div class="card-body">

                    @foreach ($data['articles'] as $key => $value)
                       
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title"><b> {{$value->title}}</b> posted by <b>{{$value->user->name}}</b> on <b>{{$value->created_at->format('d M y')}}</b></h5> 
                        <p class="card-text">{!!$value->description!!}</p>
                         <a href="{{route('details',$value->slug)}}" class="btn btn-primary">View in details</a>
                      </div>

                    </div>

                    <br>
                        
                    @endforeach

                </div>
            </div>
        </div>



        <div class="col-md-3">
          <div class="card">
                <div class="card-header">Archives.</div>
                <div class="card-body">
                    @foreach($archives as $archive)
                        <div class="card">
                          <div class="card-body" style="text-align: center;">
                           <a href="{{ route('archives', ['month' => $archive->monthname, 'year'=>$archive->year]) }}"> <h4>{{ $archive->monthname }}, {{ $archive->year }} <br><b class="badge">{{ $archive->post_count }} posts</h4></a>
                          </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
        </div>
    </div>
</div>
@endsection
