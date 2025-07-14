<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    public function run()
    {
        // Seed Authors
        $authors = [
            [
                'name' => 'Dr. Emma Thompson',
                'role' => 'Chief Technology Officer',
                'avatar' => 'images/team/emma-thompson.jpg',
                'bio' => 'Dr. Emma Thompson has over 15 years of experience in sustainable technology development and environmental computing. She leads our technical initiatives and research into green computing practices.',
                'twitter' => 'https://twitter.com/emmathompson',
                'linkedin' => 'https://linkedin.com/in/emmathompson',
                'github' => 'https://github.com/emmathompson',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Michael Chen',
                'role' => 'Head of Robotics',
                'avatar' => 'images/team/michael-chen.jpg',
                'bio' => 'Dr. Michael Chen specializes in robotics and automation systems with a focus on environmental sustainability. He leads our robotics division and research into energy-efficient automation solutions.',
                'twitter' => 'https://twitter.com/drmichaelchen',
                'linkedin' => 'https://linkedin.com/in/michaelchen',
                'github' => 'https://github.com/michaelchen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sarah Johnson',
                'role' => 'Lead Software Architect',
                'avatar' => 'images/team/sarah-johnson.jpg',
                'bio' => 'Sarah Johnson is a software architect with a passion for sustainable development practices. She leads our software development initiatives and advocates for environmentally conscious coding practices.',
                'twitter' => 'https://twitter.com/sarahjdev',
                'linkedin' => 'https://linkedin.com/in/sarahjohnson',
                'github' => 'https://github.com/sarahjdev',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Priya Patel',
                'role' => 'Cloud Architecture Specialist',
                'avatar' => 'images/team/priya-patel.jpg',
                'bio' => 'Dr. Priya Patel is a cloud architecture specialist with expertise in sustainable computing practices. She leads our cloud infrastructure initiatives and research into green computing solutions.',
                'twitter' => 'https://twitter.com/drpriyapatel',
                'linkedin' => 'https://linkedin.com/in/priyapatel',
                'github' => 'https://github.com/priyapatel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('blog_authors')->insert($authors);

        // Seed Categories
        $categories = [
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'description' => 'Latest developments in sustainable technology',
                'icon' => 'computer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Robotics',
                'slug' => 'robotics',
                'description' => 'Advances in green robotics and automation',
                'icon' => 'robot',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Software Development',
                'slug' => 'software-development',
                'description' => 'Sustainable software development practices',
                'icon' => 'code',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cloud Computing',
                'slug' => 'cloud-computing',
                'description' => 'Green cloud computing solutions',
                'icon' => 'cloud',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('blog_categories')->insert($categories);

        // Seed Tags
        $tags = [
            ['name' => 'Sustainability', 'slug' => 'sustainability'],
            ['name' => 'Green Computing', 'slug' => 'green-computing'],
            ['name' => 'Innovation', 'slug' => 'innovation'],
            ['name' => 'Environmental', 'slug' => 'environmental'],
            ['name' => 'AI', 'slug' => 'ai'],
            ['name' => 'IoT', 'slug' => 'iot'],
            ['name' => 'Best Practices', 'slug' => 'best-practices'],
            ['name' => 'Infrastructure', 'slug' => 'infrastructure'],
        ];

        foreach ($tags as &$tag) {
            $tag['created_at'] = now();
            $tag['updated_at'] = now();
        }

        DB::table('blog_tags')->insert($tags);

        // Seed Posts
        $posts = [
            [
                'title' => 'The Future of Sustainable Technology Development',
                'slug' => 'sustainable-tech',
                'excerpt' => 'Exploring the intersection of technology and sustainability in modern development practices.',
                'content' => file_get_contents(resource_path('views/blog/posts/sustainable-tech.blade.php')),
                'author_id' => 1, // Emma Thompson
                'category_id' => 1, // Technology
                'featured_image' => 'images/blog/sustainable-tech-hero.jpg',
                'read_time' => 5,
                'is_featured' => true,
                'published_at' => now()->subDays(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Advances in Green Robotics and Automation',
                'slug' => 'green-robotics',
                'excerpt' => 'How robotics and automation are driving sustainable manufacturing and operations.',
                'content' => file_get_contents(resource_path('views/blog/posts/green-robotics.blade.php')),
                'author_id' => 2, // Michael Chen
                'category_id' => 2, // Robotics
                'featured_image' => 'images/blog/robotics-automation-hero.jpg',
                'read_time' => 7,
                'is_featured' => true,
                'published_at' => now()->subDays(4),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Building Sustainable Software: Best Practices for Green Development',
                'slug' => 'sustainable-software',
                'excerpt' => 'Best practices and strategies for developing environmentally conscious software solutions.',
                'content' => file_get_contents(resource_path('views/blog/posts/sustainable-software.blade.php')),
                'author_id' => 3, // Sarah Johnson
                'category_id' => 3, // Software Development
                'featured_image' => 'images/blog/sustainable-software-hero.jpg',
                'read_time' => 6,
                'is_featured' => false,
                'published_at' => now()->subDays(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sustainable Cloud Computing: Building an Eco-Friendly Digital Infrastructure',
                'slug' => 'sustainable-cloud',
                'excerpt' => 'Strategies for implementing environmentally responsible cloud computing solutions.',
                'content' => file_get_contents(resource_path('views/blog/posts/sustainable-cloud.blade.php')),
                'author_id' => 4, // Priya Patel
                'category_id' => 4, // Cloud Computing
                'featured_image' => 'images/blog/sustainable-cloud-hero.jpg',
                'read_time' => 7,
                'is_featured' => false,
                'published_at' => now()->subDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('blog_posts')->insert($posts);

        // Seed Post-Tag Relationships
        $postTags = [
            // Sustainable Tech post tags
            ['post_id' => 1, 'tag_id' => 1], // Sustainability
            ['post_id' => 1, 'tag_id' => 2], // Green Computing
            ['post_id' => 1, 'tag_id' => 3], // Innovation
            
            // Green Robotics post tags
            ['post_id' => 2, 'tag_id' => 1], // Sustainability
            ['post_id' => 2, 'tag_id' => 6], // IoT
            ['post_id' => 2, 'tag_id' => 3], // Innovation
            
            // Sustainable Software post tags
            ['post_id' => 3, 'tag_id' => 1], // Sustainability
            ['post_id' => 3, 'tag_id' => 2], // Green Computing
            ['post_id' => 3, 'tag_id' => 7], // Best Practices
            
            // Sustainable Cloud post tags
            ['post_id' => 4, 'tag_id' => 1], // Sustainability
            ['post_id' => 4, 'tag_id' => 2], // Green Computing
            ['post_id' => 4, 'tag_id' => 8], // Infrastructure
        ];

        DB::table('blog_post_tag')->insert($postTags);

        // Seed Related Posts
        $relatedPosts = [
            // Relationships for Sustainable Tech post
            ['post_id' => 1, 'related_post_id' => 2, 'sort_order' => 1],
            ['post_id' => 1, 'related_post_id' => 3, 'sort_order' => 2],
            
            // Relationships for Green Robotics post
            ['post_id' => 2, 'related_post_id' => 1, 'sort_order' => 1],
            ['post_id' => 2, 'related_post_id' => 4, 'sort_order' => 2],
            
            // Relationships for Sustainable Software post
            ['post_id' => 3, 'related_post_id' => 1, 'sort_order' => 1],
            ['post_id' => 3, 'related_post_id' => 4, 'sort_order' => 2],
            
            // Relationships for Sustainable Cloud post
            ['post_id' => 4, 'related_post_id' => 3, 'sort_order' => 1],
            ['post_id' => 4, 'related_post_id' => 1, 'sort_order' => 2],
        ];

        DB::table('blog_related_posts')->insert($relatedPosts);

        // Seed some sample subscribers
        $subscribers = [
            [
                'email' => 'subscriber1@example.com',
                'is_active' => true,
                'subscribed_at' => now()->subDays(30),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'subscriber2@example.com',
                'is_active' => true,
                'subscribed_at' => now()->subDays(25),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('blog_subscribers')->insert($subscribers);
    }
} 