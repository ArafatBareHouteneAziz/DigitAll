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
        // Clean up malformed attachment data
        $projects = \App\Models\Project::whereNotNull('attachments')->get();
        
        foreach ($projects as $project) {
            $attachments = $project->attachments;
            $cleanedAttachments = [];
            
            if (is_array($attachments)) {
                foreach ($attachments as $attachment) {
                    if (is_array($attachment) && isset($attachment['name']) && isset($attachment['path'])) {
                        // Valid array format
                        $cleanedAttachments[] = $attachment;
                    } elseif (is_string($attachment) && !empty($attachment)) {
                        // Valid string format (from Filament)
                        $cleanedAttachments[] = $attachment;
                    }
                    // Skip malformed entries
                }
            }
            
            // Update the project with cleaned attachments
            $project->update(['attachments' => $cleanedAttachments]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration is not reversible as it's cleaning up data
    }
};
