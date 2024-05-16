@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm success-mess']) }}>
        {{ $status }}
    </div>
@endif
