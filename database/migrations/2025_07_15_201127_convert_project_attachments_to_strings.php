<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Convert all array attachments to string format for Filament compatibility
        $projects = \App\Models\Project::whereNotNull('attachments')->get();
        
        foreach ($projects as $project) {
            $attachments = $project->attachments;
            $convertedAttachments = [];
            
            if (is_array($attachments)) {
                foreach ($attachments as $attachment) {
                    if (is_array($attachment) && isset($attachment['path'])) {
                        // Convert array format to string format
                        $convertedAttachments[] = $attachment['path'];
                    } elseif (is_string($attachment) && !empty($attachment)) {
                        // Keep string format as is
                        $convertedAttachments[] = $attachment;
                    }
                    // Skip malformed entries
                }
            }
            
            // Update the project with converted attachments
            $project->update(['attachments' => $convertedAttachments]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration is not reversible as it's converting data format
    }
};
