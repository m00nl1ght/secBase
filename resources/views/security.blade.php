@extends('layouts.app')

@section('page-header')Состав смены
@endsection

@section('title-block')Security
@endsection

@section('content')

    @include('includes.messages')

    @if($page == 'new')
        @include('includes.security.new')
    @elseif($page == 'current')
        @include('includes.security.current')   
    @endif

@endsection