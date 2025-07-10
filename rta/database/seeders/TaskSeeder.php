<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $tasks = [
            ['title' => 'Setup Laravel Project', 'description' => 'Initialize a new Laravel project with required dependencies.', 'status' => 'completed', 'due_date' => Carbon::now()->subDays(5)],
            ['title' => 'Create User Authentication', 'description' => 'Implement user login, registration, and password reset.', 'status' => 'completed', 'due_date' => Carbon::now()->subDays(3)],
            ['title' => 'Design Database Schema', 'description' => 'Plan and create tables for users, tasks, and roles.', 'status' => 'completed', 'due_date' => Carbon::now()->subDays(1)],
            ['title' => 'Develop Task CRUD API', 'description' => 'Build API endpoints for creating, reading, updating, and deleting tasks.', 'status' => 'in_progress', 'due_date' => Carbon::now()->addDays(2)],
            ['title' => 'Integrate Yajra DataTables', 'description' => 'Add server-side pagination, sorting, and filtering for tasks.', 'status' => 'in_progress', 'due_date' => Carbon::now()->addDays(4)],
            ['title' => 'Implement Frontend UI', 'description' => 'Use Bootstrap and Blade templates to design task management UI.', 'status' => 'pending', 'due_date' => Carbon::now()->addDays(7)],
            ['title' => 'Write Unit Tests', 'description' => 'Create tests for TaskController and models.', 'status' => 'pending', 'due_date' => Carbon::now()->addDays(10)],
            ['title' => 'Setup Continuous Integration', 'description' => 'Configure GitHub Actions for automated testing.', 'status' => 'pending', 'due_date' => Carbon::now()->addDays(12)],
            ['title' => 'Optimize Queries', 'description' => 'Review and optimize database queries for performance.', 'status' => 'pending', 'due_date' => Carbon::now()->addDays(15)],
            ['title' => 'Implement Soft Deletes', 'description' => 'Add soft delete functionality to the tasks.', 'status' => 'completed', 'due_date' => Carbon::now()->subDays(2)],
            ['title' => 'Add Role-Based Access', 'description' => 'Restrict certain actions based on user roles.', 'status' => 'in_progress', 'due_date' => Carbon::now()->addDays(5)],
            ['title' => 'Fix UI Bugs', 'description' => 'Resolve issues reported during user testing.', 'status' => 'pending', 'due_date' => Carbon::now()->addDays(9)],
            ['title' => 'Document API Endpoints', 'description' => 'Write detailed API documentation.', 'status' => 'pending', 'due_date' => Carbon::now()->addDays(11)],
            ['title' => 'Setup Caching', 'description' => 'Add caching layer to speed up repeated queries.', 'status' => 'pending', 'due_date' => Carbon::now()->addDays(13)],
            ['title' => 'Implement Notifications', 'description' => 'Send notifications when task status changes.', 'status' => 'pending', 'due_date' => Carbon::now()->addDays(14)],
            ['title' => 'Create User Profiles', 'description' => 'Allow users to update their profiles.', 'status' => 'pending', 'due_date' => Carbon::now()->addDays(8)],
            ['title' => 'Setup Deployment Pipeline', 'description' => 'Automate deployment to production server.', 'status' => 'pending', 'due_date' => Carbon::now()->addDays(16)],
            ['title' => 'Refactor Codebase', 'description' => 'Improve code readability and maintainability.', 'status' => 'in_progress', 'due_date' => Carbon::now()->addDays(6)],
            ['title' => 'Add Logging', 'description' => 'Implement logging for debugging and audit.', 'status' => 'pending', 'due_date' => Carbon::now()->addDays(17)],
            ['title' => 'Performance Testing', 'description' => 'Test the app under load to find bottlenecks.', 'status' => 'pending', 'due_date' => Carbon::now()->addDays(18)],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
