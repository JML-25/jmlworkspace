@props(['class' => ''])

<svg {{ $attributes->merge([
    'class' => "w-5 h-5 {$class}",
    'xmlns' => 'http://www.w3.org/2000/svg',
    'viewBox' => '0 0 24 24',
    'fill' => 'currentColor',
]) }}>
    <circle cx="12" cy="5" r="1.5"/>
    <circle cx="12" cy="12" r="1.5"/>
    <circle cx="12" cy="19" r="1.5"/>
</svg>
