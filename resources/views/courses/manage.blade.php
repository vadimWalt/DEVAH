<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Courses
            </h1>
        </header>
    
        <table class="w-full table-auto rounded-sm">
            <tbody>
                {{-- @unless displays the code if the condition is false --}}
                {{-- compared to @if that shows the content is the condition is true --}}
                @unless ($courses->isEmpty())
                    @foreach ($courses as $course)
                        <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/courses/{{$course->id}}">
                            {{$course->title}}
                        </a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/courses/{{$course->id}}/edit">
                            <i class="fa-solid fa-pencil"></i> Edit
                        </a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <form method="POST" action="/courses/{{$course->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                    @endforeach
                @else
                <tr class="border-grey-300">
                    <td class="px-4 py-8 border-t border-b border-grey-300 text-lg">
                        <p class="text-center">No courses found</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>
    </x-card>  
</x-layout>