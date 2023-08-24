<x-layout>
    
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @if (count($courses) == 0)
        <p>No course found</p>
    @endif
    
    @foreach ($courses as $course)
    {{-- :course passes the current course data to the component --}}
    {{-- that way, course-card can display the data dynamically --}}
        <x-course-card :course="$course" />
    @endforeach
    </div>
    
    <div class="mt-6 p-4">
        {{$courses->links()}}
    </div>
    
    </x-layout> 