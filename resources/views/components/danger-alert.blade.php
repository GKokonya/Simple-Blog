<div class="flex justify-between p-3 bg-red-300 text-red-800 rounded shadow-sm" role="alert"
x-data={open:true}
x-show="open=open"
>
<span class="font-medium">{{$slot}}</span>
<i x-on:click="open=false" wire:click="$emit('refreshComponent')" class="cursor-pointer fa-solid fa-xmark"></i>
</div>
