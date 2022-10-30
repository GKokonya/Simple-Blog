@extends('layouts.dashboard')

@section('content')
<style>
    body{
        margin:0
    }
    .modal-wrapper{
        position: absolute;
        width:100%;
        height:100%;
        background-color:rgba(0,0,0, .5);
        display:flex;
        align-items:center;
        justify-content:center;


    }
    .mod{
        width:100%;
        max-width:30%;
        background-color:white;
        padding:20px;
    }
</style>
<div class="modal-wrapper" 
    x-data="{open:true}"
    x-show="open"
    @open-modal.window="open=true"
    x-transition.duration.500ms>
    <div class="mod shadow rounded" 
        x-on:click.outside="open=false">
        <div class="border-bottom py-2">Header</div>
        <div class="py-4">body</div>
        <div class="border-top py-2">Footer</div>

    </div>
</div>
<div x-data>
<button @click="$dispatch('open-modal')">Trigger</button>
</div>

@endsection
