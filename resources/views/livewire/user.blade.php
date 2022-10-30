<div class="container"> 

    <div class="row my-2">
        <div class="col-8 d-flex justify-content-start">
            
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input wire:model.lazy="filters.search" type="text" class="form-control w-25" placeholder="search email ...">
            </div>
            <button class="d-flex flex-nowrap btn btn-primary mx-2" x-data @click="$dispatch('open-modal')">Filter...</button>
        </div>
        <div class="col-4 d-flex justify-content-end">
            <div class="dropdown mx-2">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Bulk Action
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><x-button class=" dropdown-item"><i class="fa-solid fa-download me-1"></i>Export</x-button></li>
                    <li><x-button class="dropdown-item" onclick="confirm('Are you sure?') ||
                     event.stopImmediatePropagation()" wire:click="deleteSelected"><i class="fa-solid fa-trash me-2"></i>Delete</x-button></li>
                </ul>
            </div>
            <a href="{{route('admin.users.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>New</a>
        </div>
    
   </div>

   
    <x-table.table>

        <x-slot name="head">
            <x-table.heading> <input wire:model="selectPage" type="checkbox"/></x-table.heading>
            <x-table.heading wire:click="sortBy('id')" :heading="$sortDirection"> <i class="fa-solid fa-sort-up me-1"></i>id</x-table.heading>
            <x-table.heading wire:click="sortBy('name')">name</x-table.heading>
            <x-table.heading wire:click="sortBy('email')">email</x-table.heading>
            <x-table.heading>Actions</x-table.heading>
        </x-slot>
        
        <x-slot name="body">
            <x-table.row  
            x-data="{open:false}"
            x-show="open"
            x-cloak
            @open-modal.window="open=!open"
            
            class="bg-light">

            <x-table.cell></x-table.cell> 
            <x-table.cell> 
                <x-input type="number" wire:model.lazy="filters.id_min"/> 
                <x-input type="number" wire:model.lazy="filters.id_max"/>
            </x-table.cell>
            <x-table.cell> 
                <x-input type="text" wire:model.lazy="filters.name"/> 
            </x-table.cell>
            <x-table.cell> 
                <x-input type="text" wire:model.lazy="filters.email"/> 
            </x-table.cell>
            <x-table.cell> <x-button class="btn btn-outline-secondary" wire:click="resetFilters"> Reset Filters</x-button> </x-table.cell>
            </x-table.row>
           
            @forelse ( $users as $user )
            <x-table.row wire:loading.class.delay="opacity-25"  wire:key="{{$user->id}}" >
                <x-table.cell> 
                        <input type="checkbox" wire:model="selected" value="{{$user->id}}"/>
                    </x-table.cell>
                <x-table.cell>{{$user->id}}</x-table.cell>
                <x-table.cell>{{$user->name}}</x-table.cell>
                <x-table.cell>{{$user->email}}</x-table.cell>
                <x-table.cell><a href="{{route('admin.users.edit',$user)}}"><span class="text-primary">edit</span></a></x-table.cell>
            </x-table.row>
            @empty
                <tr colspan="4">
                <x-table.cell>
                    <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-users text-secondary py-2 h2"></i>
                    <span class="mx-1 py-2 h2 text-secondary">no users found...</span>
                    </div>
                </x-table.cell>
                </tr>
            @endforelse
  
        </x-slot>
    </x-table.table>

    <div class="row mt-2">
        <div class="col-6 d-flex justify-content-start">
            <label for="perPage" class="mx-2 mt-2">Per Page</label>
                <select class="form-select w-25 h-75" wire:model="perPage">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
        </div>

        <div class="col-6 d-flex justify-content-end" data-turbolinks="false">
        {{$users->links()}}
        </div>

    </div>

</div>