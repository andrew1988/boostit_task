@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['route'=>'add-city','method'=>'post']) !!}
                        {!! Form::text('city','',['placeholder'=>'Oras']) !!}
                        {!! Form::select('unitate_masura',['c'=>'celsius','f'=>'fahrenheit']) !!}
                        {!! Form::submit('Adauga oras') !!}
                    {!! Form::close() !!}

                    -----------------------Lista Orase---------------------------
                      @foreach($citiesList as $city)
                    <div class="row">

                        <div class="col-sm-6">
                          {!! Form::open(['route'=>['edit-city'],'method'=>'post']) !!}
                              {!! Form::hidden('city_id',$city->id) !!}
                              {!! Form::text('city',$city->city) !!}
                              Grade:{{$city->measuring_unit}}
                              {!! Form::submit('Editeaza oras') !!}
                          {!! Form::close() !!}
                        </div>
                        <div class="col-sm-6"><a href="{{ route('delete-city',['id'=>$city->id]) }}">Sterge</a></div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
