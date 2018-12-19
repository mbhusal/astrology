@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
                @include('horoscope.sidebar')
        </div>
        <div class="col-md-9">
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
                <div class="card-header">{{__("horo.Monthly Horoscope")}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($monthly)

                    @foreach($monthly as $month)

                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title"><b>{{$month->date}}</b> {{__("horo.Monthly Horoscope")}} <b style="color: blue;"> {{$month->rasi}}</b></h5> 
                        <p class="card-text">{!!$month->horoscope!!}</p>
                        <button type="button" class="btn btn-primary btn-xs"><a href="{{route('editrasi', $month-> id)}}" style="color: white;">Edit</a></button>

                        <button type="button" class="btn btn-danger btn-xs"><a href="{{route('deleterasi', $month-> id)}}" style="color: white;">Delete</a></button>
                      </div>

                    </div>

                    <br>

                    @endforeach
                    @endif



                </div>
        </div>
    </div>
</div>
@endsection
