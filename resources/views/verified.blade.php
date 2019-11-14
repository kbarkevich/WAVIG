<!DOCTYPE html>
@extends('templates.template')
@section('title', ' - Verified')
@section('style')
    <link href="{{ asset('css/verified.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="boatpanel" class="pt-3 pb-2">
    <div class="preboatname" class="pt-1">
        Congratulations! You have verified:
    </div>
    <div id="boatname" class="pb-3">
        @if (@session('boatname'))
        {{ @session('boatname')['boatname'] }}
        @endif
    </div>
    <div class="preboatname" class="pt-1">
        @if(@session('boatname'))
        with {{ @session('boatname')['email'] }}
        @endif
    </div>
    <form class="mt-3 mb-3 ml-3 mr-3" action="./boatname" method="post">
        @csrf
        <button id="newname" class="btn btn-secondary btn-block mt-4" type="submit">Generate New Name</button>
    </form>
</div>
@endsection