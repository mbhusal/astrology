@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
<div class="row">
        <div class="col-md-3">
                @include('horoscope.sidebar')

        </div>
        <div class="col-md-9">

            <div class="card">
                <div class="card-header">Today's  Horoscope</div>

                <div class="card-body">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title"></h5> 
                        <p class="card-text"></p>
                         <!-- <a href="#" class="btn btn-primary"></a> -->
                      </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
        </div>
    </div>
</div>
@endsection
