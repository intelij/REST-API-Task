@extends('layouts.app')

@section('content')

    <div class="container">

        <h1 class="pull-left">Goustos</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('goustos.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @if($goustos->isEmpty())
            <div class="well text-center">No Goustos found.</div>
        @else
            @include('goustos.table')
        @endif
        
    </div>
@endsection