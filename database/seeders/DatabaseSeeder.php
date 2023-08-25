<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Course;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Create a teacher
        $teacher = User::factory()->create(['role' => 'teacher']);

        // Create 9 students
        $students = User::factory(9)->create(['role' => 'student']);

        // Create a course owned by the teacher
        $course = Course::factory()->create(['teacher_id' => $teacher->id]);

        // Link students to the course
        $course->users()->attach($students);

        // Create a chatroom and a chat message for each student

        $chatroom = ChatRoom::factory()->create(['course_id' => $course->id]);

        foreach ($students as $student) {
            ChatMessage::factory()->create([
                'chat_rooms_id' => $chatroom->id,
                'user_id' => $student->id,
            ]);
        }
        // Create a user named John Doe
        $user = User::factory()->create([
            'name' => 'DEVAH',
            'isAdmin' => '1',
            'email' => 'admin@devah.lu',
            'password' => 'devah',
            'profile_picture' => 'public/images/admin.jpg',
        ]);

        // Create 2 courses associated with the user
        Course::factory(2)->create([
            'teacher_id' => $user->id
        ]);
    }
}