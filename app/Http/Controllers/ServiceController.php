<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show(Service $service)
    {
        if (!$service->is_active) {
            abort(404);
        }

        // Get related services
        $relatedServices = Service::where('is_active', true)
            ->where('id', '!=', $service->id)
            ->where('category', $service->category)
            ->limit(3)
            ->get();

        return view('services.show', compact('service', 'relatedServices'));
    }
}