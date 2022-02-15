<div class="form-group">
    <label>{{ $label }}</label>
    <div class="input-group">
        @if (isset($disabled) && $disabled)
            <input type="text" class="form-control input-custom" value="{{ substr($description, 0, 100) }}" disabled>
        @else
            <h3 id="{{ $modalId }}"
                class="cursor-pointer form-control input-custom {{ $errors->has($model) ? 'is-invalid' : '' }}">
                {{ isset($description) ? substr($description, 0, 100) : 'Selecione...' }}</h3>
        @endif
    </div>
    @error($model)
        <h3 class="text-danger">
            <strong>{{ $message }}</strong>
        </h3>
    @enderror
</div>
