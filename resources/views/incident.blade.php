@extends('layouts.app')

@section('page-header')События
@endsection

@section('title-block')События
@endsection

@section('content')

    @include('includes.messages')

    @if($page == 'new')
        @include('includes.incident.new')
    @elseif($page == 'index')
        @include('includes.incident.index')   
    @endif

@endsection