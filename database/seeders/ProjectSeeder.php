<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        // Get the first user and service
        $user = User::first();
        $service = Service::first();

        if (!$user || !$service) {
            return;
        }

        $projects = [
            [
                'title' => 'E-commerce Website',
                'description' => 'A modern e-commerce platform with payment integration and inventory management.',
                'status' => 'in_progress',
                'budget' => 5000.00,
                'start_date' => Carbon::now()->subDays(30),
                'end_date' => Carbon::now()->addDays(60),
                'requirements' => 'Responsive design, payment gateway integration, admin panel, inventory management system.',
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Cross-platform mobile application for iOS and Android.',
                'status' => 'completed',
                'budget' => 8000.00,
                'start_date' => Carbon::now()->subDays(90),
                'end_date' => Carbon::now()->subDays(10),
                'requirements' => 'React Native app, user authentication, push notifications, offline functionality.',
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'Complete redesign of the company website with modern UI/UX principles.',
                'status' => 'pending',
                'budget' => 3000.00,
                'start_date' => Carbon::now()->addDays(10),
                'end_date' => Carbon::now()->addDays(45),
                'requirements' => 'Wireframes, mockups, user research, interactive prototypes.',
            ],
            [
                'title' => 'Content Management System',
                'description' => 'Custom CMS for managing blog content and digital assets.',
                'status' => 'in_progress',
                'budget' => 4500.00,
                'start_date' => Carbon::now()->subDays(15),
                'end_date' => Carbon::now()->addDays(30),
                'requirements' => 'WordPress-like interface, media library, SEO optimization, user roles.',
            ],
            [
                'title' => 'API Development',
                'description' => 'RESTful API for third-party integrations and mobile app backend.',
                'status' => 'completed',
                'budget' => 6000.00,
                'start_date' => Carbon::now()->subDays(120),
                'end_date' => Carbon::now()->subDays(30),
                'requirements' => 'Node.js backend, JWT authentication, rate limiting, comprehensive documentation.',
            ],
        ];

        foreach ($projects as $projectData) {
            Project::create([
                'user_id' => $user->id,
                'service_id' => $service->id,
                'title' => $projectData['title'],
                'description' => $projectData['description'],
                'status' => $projectData['status'],
                'budget' => $projectData['budget'],
                'start_date' => $projectData['start_date'],
                'end_date' => $projectData['end_date'],
                'requirements' => $projectData['requirements'],
                'created_at' => $projectData['start_date'],
                'updated_at' => $projectData['status'] === 'completed' ? $projectData['end_date'] : Carbon::now(),
            ]);
        }
    }
} 