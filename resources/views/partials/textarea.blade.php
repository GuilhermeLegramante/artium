<div class="form-group">
    <label>{{ $label }}</label>
    <textarea wire:model.defer="{{ $model }}" rows="{{ $rows }}"
        maxlength="{{ $maxLength }} {{ isset($readonly) ? ($readonly != false ? 'readonly' : '') : '' }}"
        class="form-control input-custom {{ $errors->has($model) ? 'is-invalid' : '' }}">
        </textarea>
    @error($model)
        <p class="text-danger">
            <strong>{{ $message }}</strong>
        </p>
    @enderror
</div>
