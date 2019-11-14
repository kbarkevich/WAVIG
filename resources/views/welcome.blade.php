<!DOCTYPE html>
@extends('templates.template')
@section('title', '')
@section('style')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="main-block text-center position-ref">
    <div class="title m-b-md text-primary">WAVIG</div>
    <div class="subtitle m-b-md text-dark mb-5">Waterborne Vessel Identification Generator</div>
    <form action="/boatname" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">
            Generate New Boat Name
        </button>
    </form>
</div>
@endsection
