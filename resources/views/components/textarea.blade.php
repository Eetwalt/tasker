@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-primary/50 bg-base-200 text-white caret-primary placeholder:text-secondary/30 focus:border-primary focus:ring-secondary rounded-md shadow-sm',
]) !!}>
</textarea>
