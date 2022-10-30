<div>
    <div class="mb-3">
        <label for="name" class="form-label">title</label>
        <input type="text" wire:model="title" name="title" class="form-control"/>
        <small style="color:red;">@error('title'){{ $message }} @enderror</small>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">content</label>
        <textarea wire:model="content" name="content" id="content" cols="30" rows="5" class="form-control"></textarea>
        <small style="color:red;">@error('content'){{ $message }} @enderror</small>
    </div>
    <div class="mb-3">
        <button class="rounded btn btn-primary" wire:click="save">Save</button>
    </div>
</div>