@extends('layouts.dashboard')

@section('content')
<div>
@livewire('user')
</div>
@endsection


@section('script')
<script>
    window.addEventListener('show-form',event=>{
        var myModal = new bootstrap.Modal(document.getElementById('form'))
myModal.hide()
    });
</script>
@endsection
