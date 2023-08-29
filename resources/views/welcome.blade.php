<x-layout>

    <!-- Include the partial for the description of DEVAH ACADEMY -->
    @include('partials._description')

    <!-- Include the partial for explaining how the platform works -->
    @include('partials._steps')

    <!-- Include the course list component with the provided courses -->
    <x-latest-course :courses="$courses" />

</x-layout>
