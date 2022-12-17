<div class="flex justify-between p-3 bg-yellow-300 text-yellow-800 rounded shadow-sm" 
role="alert" 
x-data={open:true}
x-show="open=open"
>
<span class="font-medium">{{$slot}}</span>
<i x-on:click="open=false" wire:click="$emit('refreshComponent')" class="cursor-pointer fa-solid fa-xmark"></i>
</div>