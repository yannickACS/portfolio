<div class="form-group">
  <label for="{{ $name }}">{{ $title }}</label>
  <select class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}" name="{{ $name }}" {{ $required ? 'required' : ''}}" id="{{ $name }}">
  	@foreach($options as $option)
    	<option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
    @endforeach
  </select>
  @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>