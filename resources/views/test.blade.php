{{-- 
    {{ dd($modules) }}
 --}}




<x-layout>
    <course-card>
        @foreach ($modules as $module)
            <x-card :module="$module" />
        @endforeach
    </course-card>
    <div class="mt-6 p-4">
       {{--  {{ $modules->links() }} --}}
    </div>
</x-layout>
