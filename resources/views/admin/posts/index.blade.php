@extends('layouts.dashboard')

@section('content')
    @livewire('post-table')
@endsection

@section('scripts')
<script>
    document.addEventListener('closeModal', event => {

    let myModalEl = document.getElementById('modalForm')
    let modal = bootstrap.Modal.getInstance(myModalEl)
    modal.hide()
    

    });

    window.addEventListener('openModal', event => {
    //Open Modal
    var myModal = new bootstrap.Modal(document.getElementById('modalForm'))
    myModal.show()

    });


    //Open Delete Modal
    window.addEventListener('openDeleteModal', event => {
    var myModal = new bootstrap.Modal(document.getElementById('modalFormDelete'))
    myModal.show()
    });

    //Close Delete Modal
    document.addEventListener('closeDeleteModal', event => {
    let myModalEl = document.getElementById('modalFormDelete')
    let modal = bootstrap.Modal.getInstance(myModalEl)
    modal.hide()
    });

    </script>
@endsection
