<?php

namespace Database\Seeders;

use App\Models\
{
    User,
    StudentSubject,
    Student,
    Subject,
    Semester,
};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semesters = ["First Semester", "Second Semester", "Summer Term"];

        foreach($semesters as $semester)
        {
            Semester::firstOrCreate(["semester_name" => $semester]);
        }

        $students = Student::pluck("student_id")->toArray();
        $subjects = Subject::pluck("subject_id")->toArray();
        $semesters = Semester::pluck("semester_id")->toArray();

        if(empty($students) || empty($subjects) || empty($semesters))
        {
            $this->command->error("Insufficient Data To Generate for the table student_subjects");
            return;
        }

        StudentSubject::factory()->count(10)->create(
            [
                "student_id" => fn () => $students[array_rand($students)],
                "subject_id" => fn () => $subjects[array_rand($subjects)],
                "semester_id" => fn () => $semesters[array_rand($semesters)],
            ]
        );
    }
}
