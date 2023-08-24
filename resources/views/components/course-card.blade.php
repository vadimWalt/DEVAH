@props(['course'])

<div class="min-h-screen bg-gray-500 py-20">
    <h2 class="text-3xl text-center mb-8">New Courses</h2> <!-- Added heading here -->
    <div class="container mx-auto md:px-4 md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 space-y-4 md:space-y-0">
        <x-card />
        <x-card />
        <x-card />
    </div>
</div>
