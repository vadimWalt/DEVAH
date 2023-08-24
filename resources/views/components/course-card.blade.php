@props(['course'])


<!-- component -->
<div class="min-h-screen bg-gradient-to-tr from-red-300 to-yellow-200 flex justify-center items-center py-20">
    <div class="md:px-4 md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 space-y-4 md:space-y-0">
        <x-card />
        <x-card />
        <x-card />




    </div>
</div>


{{--@props(['course'])

<div class="bg-white shadow-lg rounded-lg overflow-hidden">
    <!-- Your course card content here -->
    <div class="p-6">
        <h3 class="text-xl font-semibold">{{ $course->title }}</h3>
        <!-- Other content here -->
    </div>
</div>



@extends('layouts.app') <!-- Assuming you have a layout defined in resources/views/layouts/app.blade.php -->

@section('content')
<div class="min-h-screen bg-gradient-to-tr from-red-300 to-yellow-200 flex justify-center items-center py-20">
    <div class="md:px-4 md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 space-y-4 md:space-y-0">
        @foreach ($courses as $course)
            <x-course-card :course="$course" />
        @endforeach
    </div>
</div>
@endsection--}}
