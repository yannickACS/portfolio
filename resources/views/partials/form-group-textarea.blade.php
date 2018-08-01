<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <textarea class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}" rows="5" id="{{ $name }}" name="{{ $name }}">{{ old($name, isset($value) ? $value : '') }}</textarea>
    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>