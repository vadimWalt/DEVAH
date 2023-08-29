<div {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6 align-start']) }}>
    <div class="flex justify-between items-center mb-2">
        <small class="font-semibold">
            {{ $username }}
        </small>
    </div>
    <p class="text-sm">
        {{ $messageContent }}
    </p>
    <br>

    <span class="text-xs text-gray-400">
        {{ $timestamp }}
    </span>
</div>

