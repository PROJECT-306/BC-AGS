<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## THINGS TO DO(Update as needed)
 -Change some inconsistencies with foriegn key constraints
 -Dynamic Input for grade calculation
 -Add a class record system

## Backend Update Logs

## March 25, 2025

(Bogart)
 - Uploaded the project in the branch repo
 - Removed the Instructor Table in the Migration
 - Modified the migrations to adjust the removal of the Instructor Table
(TimenyaSupangibab)
 - Adjusted some text format errors when pushing to the branch

## March 28, 2025

(TimenyaSupangibab)
 - Added a standardized structure for backend components(MVC and Routes)
 - Modified some foreign key constraints and relations from student class records
 - Adjust the DB to adjust to the changes made in the student class records table
 - Modified the Breeze user account Model and Controller to accomodate to the changes in the user table

## March 31, 2025
(TimenyaSupangibab)
 - Minor Changes to the Migrations
 - Added Factories and Seeders

 ## April 3, 2025
 (TimnyaSupangibab)
 -Added CRUD Functionalities to tables that dont need Grade Calculations

 ## April 11, 2025
 feat: Enhance class work and grading calculations

- Fix total items auto-population in student class work form
- Update grade calculation to average multiple assessments
- Apply correct weight percentages (40% quizzes, 20% OCR, 40% exams)
- Fix student class work form submission

## April 30, 2025
(Bogart)
- Refactored grading logic so that computed grades are now stored exclusively in the `student_class_records` table.
- Removed all logic and references to the `final_grades` table from controllers and views to prevent redundant data and related SQL errors.
- Streamlined grade management: all computed grade operations (creation, update, and display) are now centralized in `student_class_records`.
- This change improves data consistency and avoids confusion between "Final Grade" and "Computed Grade" fields.
