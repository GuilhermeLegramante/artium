<div class="form-group">
    <label>{{ $label }}</label>
    <input type="date" max="3000-01-01" class="form-control" wire:model.defer='{{ $model }}' placeholder="{{ $placeholder }}">
    @error($model)
        <p class="text-danger">
            <strong>{{ $message }}</strong>
        </p>
    @enderror
</div>
