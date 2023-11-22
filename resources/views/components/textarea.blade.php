<div class="row mb-3">
    <label for="{{ $name }}" class="col-md-4 col-form-label text-md-end">{{ $label }}</label>

    <div class="col-md-6">

        <textarea class="textarea" name="{{ $name }}" id="{{ $name }}" style="width: 400px;height: 100px;">
@isset($object->{$name})
{{ old($name) ? old($name) : $object->{$name} }}
@else
{{ old($name) }}
@endisset
</textarea>

        @if ($errors->has($name))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first($name) }}
            </span>
        @endif
    </div>
</div>
