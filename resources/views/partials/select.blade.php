<div class="col-md-{{ $columnSize }}">
    <div class="form-group">
        <label>{{ $label }}</label>
        <div class="form-group">
            <div class="input-group">
                <select wire:model.lazy="{{ $model }}"
                    class="form-control form-control-sm {{ $errors->has($model) ? 'is-invalid' : '' }}" {{ isset($disabled) && $disabled == true ? 'disabled' : '' }}>
                    <option value="">Selecione...</option>
                    @foreach ($options as $item)
                        <option value="{{ $item['value'] }}">{{ $item['description'] }}</option>
                    @endforeach
                </select>
            </div>
            @error($model)
                <p class="text-danger">
                    <strong>{{ $message }}</strong>
                </p>
            @enderror
        </div>
    </div>
</div>