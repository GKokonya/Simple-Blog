<div>


    <div class="d-flex justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" wire:click="openModal">
        <i class="fa fa-plus-circle"></i>
        Add Post
        </button>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Save Post</h5>
                    <button type="button" class="btn-close" aria-label="Close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                @livewire('post-form')
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->

    <div class="modal fade" id="modalFormDelete" tabindex="-1" aria-labelledby="modalFormDeletePost" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to Proceed?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" wire:click="delete" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!--Delete Modal-->


    <div>
        @if ($posts->count())
            <div class="table-responsive mt-5">
                <table class="table table-hover border align-middle mb-0 bg-white shadow rounded">
                <thead class="bg-light">
                    <tr class="text-left">
                    <th scope="col" class="">#ID</th>
                    <th scope="col" class="">Title</th>
                    <th scope="col" class="">Date Posted</th>
                    <th scope="col" class="">Edit</th>
                    <th scope="col" class="">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $posts as $post)
                    <tr class="text-left">
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>@php
                        $input=$post->created_at;
                        $date = strtotime($input);
                        echo date('d/m/y', $date);
                        @endphp
                    </td>
                    <td><button class="btn btn-link btn-rounded btn-sm fw-bold text-decoration-none" wire:click="selectItem({{$post->id}},'edit')">edit</button></td>
                    <td><button class="btn btn-link btn-rounded btn-sm fw-bold text-decoration-none text-danger" wire:click="selectItem({{$post->id}},'delete')">delete</button></td>
                    </tr>
                    @endforeach
                </tbody>
                <caption>List of Blog Posts</caption>
                </table>
                {{$posts->links()}}
            </div>    
        @endif
    </div>
</div>
