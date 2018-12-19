@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

                          @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <ul>
                <li> {{ session('success') }}</li>
            </ul>
        </div>
    @endif
<div class="row">
        <div class="col-md-9">

            <div class="card">
                <div class="card-header">Posted Ideas.</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($items as $item)

                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title"><b>{{$item->title}}</b> posted by <b>{{$item->user->name}}</b> on <b>{{$item->created_at->format('d M y')}}</b></h5> 
                        <p class="card-text">{!!$item->description!!}</p>
                         <a href="{{route('details',$item->slug)}}" class="btn btn-primary">View in details</a>
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
