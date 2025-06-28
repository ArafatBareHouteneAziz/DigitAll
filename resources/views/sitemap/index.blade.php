<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Home Page -->
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toISOString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>

    <!-- About Page -->
    <url>
        <loc>{{ url('/about') }}</loc>
        <lastmod>{{ now()->toISOString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- Services Page -->
    <url>
        <loc>{{ url('/services') }}</loc>
        <lastmod>{{ now()->toISOString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>

    <!-- Individual Services -->
    @foreach($services as $service)
        <url>
            <loc>{{ route('services.show', $service) }}</loc>
            <lastmod>{{ $service->updated_at->toISOString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach

    <!-- Blog Page -->
    <url>
        <loc>{{ url('/blog') }}</loc>
        <lastmod>{{ now()->toISOString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- Contact Page -->
    <url>
        <loc>{{ url('/contact') }}</loc>
        <lastmod>{{ now()->toISOString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
</urlset> 