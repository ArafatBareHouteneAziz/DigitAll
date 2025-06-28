<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $content = view('sitemap.index', [
            'services' => Service::where('is_active', true)->get(),
        ]);

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
} 