<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Project;

class SeoController extends Controller
{
    public function sitemap(): Response
    {
        $projects = Project::select('slug', 'updated_at')->latest()->get();
        $now = now()->toAtomString();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Static pages
        $staticPages = [
            ['url' => url('/'),          'priority' => '1.0', 'freq' => 'weekly'],
            ['url' => url('/projects'),  'priority' => '0.9', 'freq' => 'weekly'],
        ];

        foreach ($staticPages as $page) {
            $xml .= "<url>";
            $xml .= "<loc>{$page['url']}</loc>";
            $xml .= "<lastmod>{$now}</lastmod>";
            $xml .= "<changefreq>{$page['freq']}</changefreq>";
            $xml .= "<priority>{$page['priority']}</priority>";
            $xml .= "</url>";
        }

        // Dynamic project pages
        foreach ($projects as $project) {
            $loc = url("/projects/{$project->slug}");
            $lastmod = $project->updated_at->toAtomString();
            $xml .= "<url>";
            $xml .= "<loc>{$loc}</loc>";
            $xml .= "<lastmod>{$lastmod}</lastmod>";
            $xml .= "<changefreq>monthly</changefreq>";
            $xml .= "<priority>0.8</priority>";
            $xml .= "</url>";
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /dashboard/\n";
        $content .= "Disallow: /profile/\n";
        $content .= "\nSitemap: " . url('/sitemap.xml') . "\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }
}
