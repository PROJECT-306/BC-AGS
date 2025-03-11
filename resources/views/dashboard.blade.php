<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>Welcome, {{ Auth::user()->full_name }}!</h3>
                    <p>Email: {{ Auth::user()->email }}</p>
                    
                    <p>Role: 
                        @if(Auth::user()->role == 4)
                            Super Admin / Developer
                        @elseif(Auth::user()->role == 3)
                            Admin / MIS
                        @elseif(Auth::user()->role == 2)
                            Dean
                        @elseif(Auth::user()->role == 1)
                            Chairperson
                        @elseif(Auth::user()->role == 0)
                            Instructor
                        @else
                            Unknown
                        @endif
                    </p>

                    <p>Department: {{ Auth::user()->department->department_name ?? 'N/A' }}</p>

                    <!-- Department List -->
                    <h3 class="mt-6 text-lg font-semibold">Departments</h3>
                    <table class="table-auto w-full border-collapse border border-gray-300 mt-2">
                        <thead>
                            <tr class="bg-gray-700 text-white">
                                <th class="border border-gray-300 px-4 py-2">Department ID</th>
                                <th class="border border-gray-300 px-4 py-2">Department Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $department->department_id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $department->department_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Courses List -->
                    <h3 class="mt-6 text-lg font-semibold">Courses</h3>
                    <table class="table-auto w-full border-collapse border border-gray-300 mt-2">
                        <thead>
                            <tr class="bg-blue-700 text-white">
                                <th class="border border-gray-300 px-4 py-2">Course ID</th>
                                <th class="border border-gray-300 px-4 py-2">Course Name</th>
                                <th class="border border-gray-300 px-4 py-2">Course Code</th>
                                <th class="border border-gray-300 px-4 py-2">Department ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $course->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $course->course_name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $course->course_code }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $course->department_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Subjects List -->
                    <h3 class="mt-6 text-lg font-semibold">Subjects</h3>
                    <table class="table-auto w-full border-collapse border border-gray-300 mt-2">
                        <thead>
                            <tr class="bg-green-700 text-white">
                                <th class="border border-gray-300 px-4 py-2">Subject ID</th>
                                <th class="border border-gray-300 px-4 py-2">Subject Code</th>
                                <th class="border border-gray-300 px-4 py-2">Subject Description</th>
                                <th class="border border-gray-300 px-4 py-2">Course ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $subject->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $subject->subject_code }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $subject->subject_description }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $subject->course_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Students List -->
                    <h3 class="mt-6 text-lg font-semibold">Students</h3>
                    <table class="table-auto w-full border-collapse border border-gray-300 mt-2">
                        <thead>
                            <tr class="bg-red-700 text-white">
                                <th class="border border-gray-300 px-4 py-2">Student ID</th>
                                <th class="border border-gray-300 px-4 py-2">Full Name</th>
                                <th class="border border-gray-300 px-4 py-2">Year Level</th>
                                <th class="border border-gray-300 px-4 py-2">Course ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $student->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        {{ $student->firstname }} {{ $student->middlename }} {{ $student->surname }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $student->year_level }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $student->course_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
