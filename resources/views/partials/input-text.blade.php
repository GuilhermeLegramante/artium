<div class="form-group">
    <label>{{ $label }}</label>
    <input type="text" class="form-control" wire:model.lazy='{{ $model }}' placeholder="{{ $placeholder }}">
    @error($model)
        <p class="text-danger">
            <strong>{{ $message }}</strong>
        </p>
    @enderror
</div>
