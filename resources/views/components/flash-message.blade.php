{{-- session() is the helper that gives access to the $_SESSION --}}
{{-- not only that but it also provids useful functions like has() --}}
@if (session()->has('message'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-9 left-1/2 transform -translate-x-1/2 bg-yellow-600 text-black rounded-full px-48 py-3">
    {{-- x-data : when flash message is triggered, it will be displayed --}}
    {{-- x-init : after 3 seconds, the message will go away --}}
    <p>
        {{ session('message') }}
    </p>
</div>
@endif


