<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Professional web development services including custom websites, web applications, and e-commerce solutions.',
                'features' => [
                    'Custom Website Development',
                    'Web Application Development',
                    'E-commerce Solutions',
                    'CMS Development',
                    'API Integration',
                ],
                'base_price' => 5000.00,
                'category' => 'development',
                'is_active' => true,
                'metadata' => [
                    'technologies' => ['Laravel', 'React', 'Vue.js', 'Node.js'],
                    'delivery_time' => '4-12 weeks',
                ],
            ],
            [
                'name' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'description' => 'End-to-end mobile application development for iOS and Android platforms.',
                'features' => [
                    'Native iOS Development',
                    'Native Android Development',
                    'Cross-platform Development',
                    'App Store Submission',
                    'App Maintenance',
                ],
                'base_price' => 8000.00,
                'category' => 'development',
                'is_active' => true,
                'metadata' => [
                    'technologies' => ['Swift', 'Kotlin', 'React Native', 'Flutter'],
                    'delivery_time' => '8-16 weeks',
                ],
            ],
            [
                'name' => 'Smart Home Automation',
                'slug' => 'smart-home-automation',
                'description' => 'Complete smart home solutions including design, installation, and integration of various smart devices.',
                'features' => [
                    'System Design',
                    'Device Installation',
                    'Home Network Setup',
                    'Voice Control Integration',
                    'Mobile App Control',
                ],
                'base_price' => 3000.00,
                'category' => 'electronics',
                'is_active' => true,
                'metadata' => [
                    'brands' => ['Google Home', 'Amazon Alexa', 'Apple HomeKit'],
                    'warranty' => '2 years',
                ],
            ],
            [
                'name' => 'IT Consulting',
                'slug' => 'it-consulting',
                'description' => 'Strategic IT consulting services to help businesses leverage technology for growth and efficiency.',
                'features' => [
                    'Technology Assessment',
                    'Digital Transformation',
                    'IT Strategy Development',
                    'Security Consulting',
                    'Cloud Migration',
                ],
                'base_price' => 2000.00,
                'category' => 'consulting',
                'is_active' => true,
                'metadata' => [
                    'expertise' => ['Digital Strategy', 'Cloud Computing', 'Cybersecurity'],
                    'session_duration' => '4-8 weeks',
                ],
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
