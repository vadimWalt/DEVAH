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
                'picture' => '',
            ],
            [
                'title' => 'Web Development Fundamentals',
                'description' => 'Explore the foundations of web development.',
                'content' => 'In this course, you will learn about HTML...',
                'picture' => '',
            ],
            [
                'title' => 'Advanced JavaScript Techniques',
                'description' => 'Master advanced JavaScript topics.',
                'content' => 'Take your JavaScript skills to the next level...',
                'picture' => '',
            ],
            [
                'title' => 'Python Data Science Bootcamp',
                'description' => 'Learn data science using Python programming.',
                'content' => 'Delve into the world of data science with Python...',
                'picture' => '',
            ],
            [
                'title' => 'Mobile App Development with React Native',
                'description' => 'Build cross-platform mobile apps using React Native.',
                'content' => 'Create powerful mobile applications using React Native...',
                'picture' => '',
            ],
            [
                'title' => 'Machine Learning Foundations',
                'description' => 'Discover the principles of machine learning.',
                'content' => 'Dive into the algorithms and techniques of machine learning...',
                'picture' => '',
            ],
            [
                'title' => 'Creative Graphic Design Workshop',
                'description' => 'Unleash your creativity through graphic design.',
                'content' => 'Explore the world of graphic design and visual communication...',
                'picture' => '',
            ],
            [
                'title' => 'Digital Marketing Strategies',
                'description' => 'Learn effective digital marketing techniques.',
                'content' => 'Enhance your digital marketing skills to reach a wider audience...',
                'picture' => '',
            ],
            [
                'title' => 'Database Design and Optimization',
                'description' => 'Design efficient and scalable databases.',
                'content' => 'Master the art of designing databases for optimal performance...',
                'picture' => '',
            ],
            [
                'title' => 'Artificial Intelligence Essentials',
                'description' => 'Explore the fundamentals of artificial intelligence.',
                'content' => 'Discover the core concepts and applications of AI...',
                'picture' => '',
            ],
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
            $chatroom = ChatRoom::factory()->create(['course_id' => $course->id, 'name' => $course->title]);

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
