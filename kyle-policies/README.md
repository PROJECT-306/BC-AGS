# Role-Based Access Control Updates

This branch contains updates to the role-based access control system, specifically for managing user access to different features in the application.

## Changes Made

1. **User Management Access**
   - Restricted user management to SuperAdmin only
   - Removed user management access from Admin role
   - Added specific error message for unauthorized access to users page

2. **Final Grades Access**
   - Allowed Instructors to access final grades
   - Maintained SuperAdmin and Admin access to final grades

3. **Route Restriction**
   - Removed global access to users page
   - Added specific route with authorization check
   - Implemented proper redirection with error message

## Role Permissions

- **SuperAdmin (ROLE-001)**
  - Can manage users
  - Can manage final grades
  - Can manage user roles
  - Can manage courses
  - Can manage departments
  - Can manage academic years
  - Can manage semesters

- **Admin (ROLE-002)**
  - Cannot manage users
  - Can manage final grades
  - Can manage user roles
  - Can manage courses
  - Can manage departments
  - Can manage academic years
  - Can manage semesters

- **Instructor (ROLE-003)**
  - Cannot manage users
  - Can manage final grades
  - Can manage class sections
  - Can manage class works
  - Can manage grading periods
  - Can manage student class records
  - Can manage student class works
  - Can manage student grades

- **Chairperson (ROLE-004)**
  - Cannot manage users
  - Cannot manage final grades
  - Can manage courses
  - Can manage departments
  - Can manage academic years
  - Can manage semesters

- **Dean (ROLE-005)**
  - Cannot manage users
  - Cannot manage final grades
  - Can manage courses
  - Can manage departments
  - Can manage academic years
  - Can manage semesters

## Error Messages
- When accessing the users page as a non-SuperAdmin:
  "The users page is only accessible to SuperAdmin and Admin users."

## Implementation Details

1. Updated `RoleGates.php` to:
   - Restrict user management to SuperAdmin only
   - Allow Instructors to manage final grades

2. Updated `web.php` routes to:
   - Remove global access to users page
   - Add specific route with authorization check
   - Implement proper redirection with error message

3. Updated middleware and policies to:
   - Properly restrict access based on user roles
   - Show clear error messages for unauthorized access
