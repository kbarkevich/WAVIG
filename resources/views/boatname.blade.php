<!DOCTYPE html>
@extends('templates.template')
@section('title', ' - New Boat Name')
@section('style')
    <link href="{{ asset('css/boatname.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="boatpanel" class="pt-3 pb-2">
    <div id="preboatname" class="pt-1">
        Your boat's name is....
    </div>
    <div id="boatname" class="pb-3">
        {{ $wordcombo->boat_name() }}
    </div>
    <form action="./saveboatname" method="post">
        @csrf
        <div class="d-flex flex-row justify-content-around bd-highlight">
            <div id="register" class="font-weight-bold">Register Name</div>
            <input type="hidden" name="wordcombo_id" value={{ $wordcombo->id }}>
            <input type="text" name="email" id="email" placeholder="Email..." required>
            <button class="btn btn-primary" type="submit">Send Verification</button>
        </div>
    </form>
    <form class="mt-3 mb-3 ml-3 mr-3" action="./boatname" method="post">
        @csrf
        <button id="newname" class="btn btn-secondary btn-block mt-4" type="submit">Generate New Name</button>
    </form>
</div>
@endsection