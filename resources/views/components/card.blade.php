<div {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6'])}}>
    {{-- to insert content inside a component, we need something more --}}
    {{$slot}}
    {{-- the $slot variable is the placeholder for all content to be inserted --}}
</div>