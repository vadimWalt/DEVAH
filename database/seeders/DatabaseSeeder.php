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
        // $teacher = User::factory()->create(['role' => 'teacher']);        

        // Create a user 
        $teacher = User::factory()->create([
            'name' => 'DEVAH',
            'isAdmin' => '1',
            'email' => 'admin@devah.lu',
            'password' => 'devah',
            'role' => 'teacher',
            'profile_picture' => 'profilePictures/teacher.jpg',
        ]);

        $student = User::factory()->create([
            'name' => 'student',
            'isAdmin' => '1',
            'email' => 'student@devah.lu',
            'password' => 'student',
            'role' => 'student',
            'profile_picture' => 'profilePictures/student.jpg',
        ]);

        // Course details
        $courseDetails = [
            [
                'title' => 'Introduction to Programming',
                'description' => 'Learn the basics of programming and coding.',
                'content' => 'This course covers programming concepts...',
            ],
            [
                'title' => 'Web Development Fundamentals',
                'description' => 'Explore the foundations of web development.',
                'content' => 'In this course, you will learn about HTML...',
            ],
            // Add more course details here
        ];

        foreach ($courseDetails as $courseDetail) {
            $course = Course::factory()->create([
                'teacher_id' => $teacher->id,
                'title' => $courseDetail['title'],
                'description' => $courseDetail['description'],
                'content' => $courseDetail['content'],
            ]);

            // Link students to the course
            $course->users()->attach($student);

            // Create a chatroom and a chat message for each student
            $chatroom = ChatRoom::factory()->create(['course_id' => $course->id]);

            // Create 9 students
            $students = User::factory(9)->create(['role' => 'student']);

            // Create a course owned by the teacher
            // $course = Course::factory()->create(['teacher_id' => $teacher->id]);

            foreach ($students as $student) {
                ChatMessage::factory()->create([
                    'chat_rooms_id' => $chatroom->id,
                    'user_id' => $student->id,
                ]);
            }
        }
    }
}
