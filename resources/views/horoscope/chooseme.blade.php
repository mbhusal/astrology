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
                <div class="card-header">{{__("horo.View Horoscope")}}</div>
                <div class="card-body">
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary"><a href="{{route('myrasi','today')}}" style="color: white;">{{__("horo.today")}}</a></button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary"><a href="{{route('myrasi','thismonth')}}" style="color: white;">{{__("horo.thismonth")}}</a></button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary"><a href="{{route('myrasi','thisyear')}}" style="color: white;">{{__("horo.thisyear")}}</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
