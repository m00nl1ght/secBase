@extends('layouts.app')

@section('page-header')Карты доступа
@endsection

@section('title-block')Карты доступа
@endsection

@section('content')

    @include('includes.messages')

    @if($page == 'create')
        @include('includes.card.create')
    @elseif($page == 'index')
        @include('includes.card.index')   
    @endif

@endsection