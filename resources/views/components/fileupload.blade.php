<div class="row mb-3">
    <label for="{{ $name }}" class="col-md-4 col-form-label text-md-end">{{ $name }}</label>

    <div class="col-md-6">
        <input type="file" name="{{ $name }}" id="{{ $name }}" />
    </div>
</div>

@if ($errors->has($name))
    <span class="invalid-feedback" role="alert">
        {{ $errors->first($name) }}
    </span>
@endif
