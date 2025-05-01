@extends('layouts.app')

@section('title', 'View Grades')

@section('content')
    <h2 class="font-bold text-[#023336] mb-6 text-sm" x-text="title"></h2>

    <!-- Courses -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" x-show="view === 'courses'" x-cloak>
        <template x-for="(course, key) in Object.keys(instructors)">
            <div
                class="bg-white rounded-lg shadow-md p-5 flex items-center gap-4 cursor-pointer hover:shadow-lg transition-shadow"
                @click="selectCourse(key)"
            >
                <i :class="icons[key]" class="text-[#4da674] text-4xl flex-shrink-0"></i>
                <div>
                    <div class="font-semibold text-[#023336]" x-text="key"></div>
                    <div class="text-[#4da674] text-xs leading-tight max-w-xs" x-text="courseNames[key]"></div>
                </div>
            </div>
        </template>
    </div>

    <!-- Instructors -->
    <div x-show="view === 'instructors'" x-cloak>
        <button class="mb-4 px-4 py-2 bg-[#4da674] text-white rounded-md hover:bg-green-700 transition" @click="view = 'courses'">
            &larr; Back to Courses
        </button>
        <h3 class="font-bold text-[#023336] mb-6 text-sm" x-text="instructorTitle"></h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="instructor in instructors[selectedCourse]">
                <div
                    class="bg-white rounded-lg shadow-md p-5 flex items-center gap-4 cursor-pointer hover:shadow-lg transition-shadow"
                    @click="selectInstructor(instructor)"
                >
                    <i :class="icons[selectedCourse]" class="text-[#4da674] text-4xl flex-shrink-0"></i>
                    <div class="font-semibold text-[#023336]" x-text="instructor"></div>
                </div>
            </template>
        </div>
    </div>

    <!-- Students -->
    <div x-show="view === 'students'" x-cloak class="mt-6">
        <button class="mb-4 px-4 py-2 bg-[#4da674] text-white rounded-md hover:bg-green-700 transition" @click="view = 'instructors'">
            &larr; Back to Instructors
        </button>
        <h3 class="font-bold text-[#023336] mb-4 text-sm" x-text="studentsTitle"></h3>
        <div class="mb-4">
            <input
                type="text"
                placeholder="Search students..."
                x-model="search"
                class="w-full max-w-sm border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#4da674]"
            />
        </div>
        <div class="overflow-x-auto bg-white rounded-lg shadow-md p-4">
            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-[#4da674] text-white text-left">
                        <th class="border border-gray-300 px-3 py-2">Student Name</th>
                        <th class="border border-gray-300 px-3 py-2">Year & Course</th>
                        <th class="border border-gray-300 px-3 py-2">Prelim</th>
                        <th class="border border-gray-300 px-3 py-2">Midterm</th>
                        <th class="border border-gray-300 px-3 py-2">Prefinal</th>
                        <th class="border border-gray-300 px-3 py-2">Final</th>
                        <th class="border border-gray-300 px-3 py-2">Average</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="student in filteredStudents" :key="student.name">
                        <tr class="even:bg-gray-50">
                            <td class="border border-gray-300 px-3 py-2" x-text="student.name"></td>
                            <td class="border border-gray-300 px-3 py-2" x-text="student.yearCourse"></td>
                            <td class="border border-gray-300 px-3 py-2 text-center">-</td>
                            <td class="border border-gray-300 px-3 py-2 text-center">-</td>
                            <td class="border border-gray-300 px-3 py-2 text-center">-</td>
                            <td class="border border-gray-300 px-3 py-2 text-center">-</td>
                            <td class="border border-gray-300 px-3 py-2 text-center">-</td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('gradeView', () => ({
            view: 'courses',
            title: 'ASBME Department',
            selectedCourse: '',
            selectedInstructor: '',
            search: '',
            instructors: {
                BSIT: ['Mrs. Pido', 'Mr. Calida', 'Mr. Venida', 'Mr. Muhammad'],
                BSBA: ['Mrs. Lague', 'Mr. Ganados', 'Ms. Puyat'],
                BSPsych: ['Mrs. Maricar', 'Mr. Magtibay'],
                BEED: ['Mr. Dusal', 'Mrs. Pasa'],
                BSTheo: ['Mrs. Ping', 'Mrs. Grace', 'Mrs. Arguelles'],
                BSHM: ['Mr. Adalid', 'Mr. Eumague'],
            },
            courseNames: {
                BSIT: 'Bachelor of Science in Information Technology',
                BSBA: 'Bachelor of Science in Business Administration',
                BSPsych: 'Bachelor of Science in Psychology',
                BEED: 'Bachelor of Elementary Education',
                BSTheo: 'Bachelor of Theology',
                BSHM: 'Bachelor of Science in Hospitality Management',
            },
            icons: {
                BSIT: 'fas fa-laptop-code',
                BSBA: 'fas fa-briefcase',
                BSPsych: 'fas fa-brain',
                BEED: 'fas fa-chalkboard-teacher',
                BSTheo: 'fas fa-praying-hands',
                BSHM: 'fas fa-concierge-bell',
            },
            students: [
                { name: 'Juan Dela Cruz', yearCourse: '3rd Year BSIT' },
                { name: 'Maria Clara', yearCourse: '2nd Year BSBA' },
                { name: 'Jose Rizal', yearCourse: '4th Year BSPsych' },
                { name: 'Andres Bonifacio', yearCourse: '1st Year BEED' },
                { name: 'Emilio Aguinaldo', yearCourse: '3rd Year BSTheo' },
                { name: 'Apolinario Mabini', yearCourse: '2nd Year BSHM' },
                { name: 'Melchora Aquino', yearCourse: '4th Year BSIT' },
                { name: 'Gregorio del Pilar', yearCourse: '3rd Year BSBA' },
                { name: 'Antonio Luna', yearCourse: '1st Year BSPsych' },
                { name: 'Marcelo H. del Pilar', yearCourse: '2nd Year BEED' }
            ],
            get filteredStudents() {
                if (!this.search) return this.students;
                return this.students.filter(s =>
                    s.name.toLowerCase().includes(this.search.toLowerCase()) ||
                    s.yearCourse.toLowerCase().includes(this.search.toLowerCase())
                );
            },
            selectCourse(course) {
                this.selectedCourse = course;
                this.instructorTitle = `${course} Instructors`;
                this.view = 'instructors';
            },
            selectInstructor(name) {
                this.selectedInstructor = name;
                this.studentsTitle = `Students of ${name} (${this.selectedCourse})`;
                this.view = 'students';
            },
            goTo(view) {
                this.view = view;
                this.title = 'ASBME Department';
            }
        }));
    });
</script>
@endsection
