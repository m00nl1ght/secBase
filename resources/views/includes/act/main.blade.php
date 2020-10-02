@extends('layouts.act_app')

@section('page-header')Акт
@endsection

@section('title-block')Акт
@endsection

@section('content')
    @include('includes.messages')
    @include('includes.act.act_form')
@endsection