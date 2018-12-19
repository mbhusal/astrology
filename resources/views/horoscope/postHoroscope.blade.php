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
                <div class="card-header">{{__("horo.Post Horoscope")}}</div>
                <div class="card-body">
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary"><a href="{{route('post_today_horoscope')}}" style="color: white;">{{__("horo.Daily Horoscope")}}</a></button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary"><a href="{{route('post_monthly_horoscope')}}" style="color: white;">{{__("horo.Monthly Horoscope")}}</a></button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary"><a href="{{route('post_yearly_horoscope')}}" style="color: white;">{{__("horo.Yearly Horoscope")}}</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
