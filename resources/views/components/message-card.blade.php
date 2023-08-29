<div {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-3 align-start w-1/2 my-10' ] ) }}>
    <div class="flex justify-between items-center mb-2 ">
        <small class="font-semibold">
            {{ $username }}
        </small>
    </div>
    <p class="text-sm">
        {{ $messageContent }}
    </p>

    <span class="text-xs text-gray-400">
        {{ $timestamp }}
    </span>
</div>

