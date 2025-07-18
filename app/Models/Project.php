<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'title',
        'description',
        'status',
        'budget',
        'start_date',
        'end_date',
        'requirements',
        'attachments',
        'metadata',
    ];

    protected $casts = [
        'attachments' => 'array',
        'metadata' => 'array',
        'budget' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', 'in_progress');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Get attachment information safely
     */
    public function getAttachmentInfo($attachment)
    {
        if (is_string($attachment) && !empty($attachment)) {
            return [
                'name' => basename($attachment),
                'path' => $attachment,
                'size' => 0, // Size not available for string format
                'type' => 'string'
            ];
        }
        
        return null;
    }

    /**
     * Get all valid attachments
     */
    public function getValidAttachments()
    {
        if (!$this->attachments || !is_array($this->attachments)) {
            return [];
        }

        $validAttachments = [];
        foreach ($this->attachments as $attachment) {
            $info = $this->getAttachmentInfo($attachment);
            if ($info) {
                $validAttachments[] = $info;
            }
        }
        
        return $validAttachments;
    }
}
