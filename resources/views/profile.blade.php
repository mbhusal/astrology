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


            <div class="card">
                <div class="card-header">Ideas you have posted till today.</div>

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
                              <!-- Example single danger button -->
                            <div class="btn-group">
                                @if($item->status == 1)
                              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Published
                                   </button>
                                @else
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Not Published
                                       </button>
                                @endif
                           

                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('publishme',$item->id)}}">Publish</a>
                                <a class="dropdown-item" href="{{route('unpublishme',$item->id)}}">Unpublish</a>
                              </div>
                            </div>
                      </div>
                    </div>
                    <br>

                    @endforeach



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
