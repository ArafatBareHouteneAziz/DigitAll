<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MessageSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        $projects = Project::take(3)->get();

        if (!$user || $projects->isEmpty()) {
            return;
        }

        $messages = [
            [
                'sender_id' => $user->id,
                'receiver_id' => $user->id, // Self-message for demo
                'project_id' => $projects->first()->id,
                'subject' => 'Project Update - E-commerce Website',
                'content' => 'Hi! I wanted to let you know that we\'ve made significant progress on the e-commerce website project. The payment integration is now complete and we\'re working on the inventory management system. We should be able to deliver the project ahead of schedule.',
                'is_read' => false,
                'created_at' => Carbon::now()->subDays(2),
            ],
            [
                'sender_id' => $user->id,
                'receiver_id' => $user->id,
                'project_id' => $projects->first()->id,
                'subject' => 'Re: Project Update - E-commerce Website',
                'content' => 'That\'s great news! I\'m excited to see the progress. Can you send me a demo of the payment integration when it\'s ready? Also, do you have any questions about the inventory requirements?',
                'is_read' => true,
                'created_at' => Carbon::now()->subDays(1),
            ],
            [
                'sender_id' => $user->id,
                'receiver_id' => $user->id,
                'project_id' => $projects->get(1)->id,
                'subject' => 'Mobile App Development - Final Review',
                'content' => 'The mobile app development project has been completed successfully! All features are working as expected and the app is ready for deployment. Please review the final version and let me know if you need any adjustments.',
                'is_read' => false,
                'created_at' => Carbon::now()->subHours(6),
            ],
            [
                'sender_id' => $user->id,
                'receiver_id' => $user->id,
                'project_id' => $projects->get(2)->id,
                'subject' => 'UI/UX Design Project - Kickoff',
                'content' => 'We\'re ready to start the UI/UX design project for your company website. I\'ve scheduled our first meeting for next week to discuss your requirements in detail. Please let me know if you have any specific design preferences or brand guidelines to share.',
                'is_read' => true,
                'created_at' => Carbon::now()->subHours(12),
            ],
            [
                'sender_id' => $user->id,
                'receiver_id' => $user->id,
                'subject' => 'Welcome to DigitAll!',
                'content' => 'Welcome to DigitAll! We\'re excited to have you on board. Our team is here to help you with all your digital innovation needs. Feel free to reach out if you have any questions about our services or need assistance with your projects.',
                'is_read' => true,
                'created_at' => Carbon::now()->subDays(5),
            ],
        ];

        foreach ($messages as $messageData) {
            Message::create($messageData);
        }
    }
} 