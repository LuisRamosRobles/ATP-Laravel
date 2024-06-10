@extends('main')
@include('header')

@section('title', 'ATP')

@section('content')


    <div>
        <a class="btn btn-primary btn-sm"
           href="{{ route('tenistas.index')}}">Tenistas</a>
        <a class="btn btn-primary btn-sm"
           href="{{ route('torneos.index') }}">Torneos</a>
    </div>



@endsection
@include('footer')
