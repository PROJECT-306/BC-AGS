<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Grade;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GradingTest extends TestCase
{
    use RefreshDatabase;

    public function test_grade_calculation()
    {
        $response = $this->post('/grades', [
            'student_id' => 1,
            'course_id' => 1,
            'assignments' => [80, 90],
            'exams' => [70, 85],
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('grades', [
            'student_id' => 1,
            'course_id' => 1,
            'grade' => 81.25, // Adjust based on your calculation logic
        ]);
    }

    public function test_grade_calculation_with_empty_assignments()
    {
        $response = $this->post('/grades', [
            'student_id' => 1,
            'course_id' => 1,
            'assignments' => [],
            'exams' => [70, 85],
        ]);

        $response->assertStatus(422); // Expect validation error
        $this->assertDatabaseMissing('grades', [
            'student_id' => 1,
            'course_id' => 1,
        ]);
    }

    public function test_grade_update()
    {
        $grade = Grade::create([
            'student_id' => 1,
            'course_id' => 1,
            'grade' => 85,
        ]);

        $response = $this->patch(route('grades.update', $grade->id), [
            'student_id' => 1,
            'course_id' => 1,
            'grade' => 90,
        ]);

        $response->assertRedirect(route('grades.index'));
        $this->assertDatabaseHas('grades', [
            'id' => $grade->id,
            'grade' => 90,
        ]);
    }

    public function test_grade_deletion()
    {
        $grade = Grade::create([
            'student_id' => 1,
            'course_id' => 1,
            'grade' => 85,
        ]);

        $response = $this->delete(route('grades.destroy', $grade->id));

        $response->assertRedirect(route('grades.index'));
        $this->assertDatabaseMissing('grades', [
            'id' => $grade->id,
        ]);
    }
} 