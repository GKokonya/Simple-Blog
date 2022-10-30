<?php

namespace App\Http\Livewire\Datatable;

trait WithSorting{
    public $sortField='id';
    public $sortDirection='asc';

    public function sortBy($title){
        if($this->sortField===$title){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc':'asc';
        }else{
            $this->sortDirection='asc';
        }
        $this->sortField=$title;
    }

    public function applySorting($query){
        return $query->orderBy($this->sortField,$this->sortDirection);
    }

}