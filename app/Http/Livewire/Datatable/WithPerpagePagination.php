<?php

namespace App\Http\Livewire\Datatable;

use Livewire\WithPagination;

trait WithPerpagePagination{

     use WithPagination;
    public $perPage='10';

    public function applyPagination($query){
        return $query->paginate($this->perPage);
    }

}