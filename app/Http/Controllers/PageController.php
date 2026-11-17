<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageController extends Controller
{
    public function main()
    {
        return view('main');
    }

    public function feature()
    {
        return view('feature');
    }

    public function about()
    {
        return view('about');
    }

    public function menu()
    {
        return view('menu');
    }

    public function team()
    {
        return view('team');
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:30',
            'date' => 'nullable|string|max:50',
            'guests' => 'nullable|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        return redirect()->back()->with('success', __('contact.form_success'));
    }

    public function sitemap(): Response
    {
        $routes = [
            ['loc' => url('/'), 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => route('menu'), 'priority' => '0.9', 'changefreq' => 'daily'],
            ['loc' => route('about'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => route('feature'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => route('gallery'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => route('team'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => route('contact'), 'priority' => '0.8', 'changefreq' => 'monthly'],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . PHP_EOL;

        foreach ($routes as $route) {
            $xml .= '    <url>' . PHP_EOL;
            $xml .= '        <loc>' . htmlspecialchars($route['loc']) . '</loc>' . PHP_EOL;
            $xml .= '        <lastmod>' . date('Y-m-d') . '</lastmod>' . PHP_EOL;
            $xml .= '        <changefreq>' . $route['changefreq'] . '</changefreq>' . PHP_EOL;
            $xml .= '        <priority>' . $route['priority'] . '</priority>' . PHP_EOL;
            $xml .= '        <xhtml:link rel="alternate" hreflang="uz" href="' . htmlspecialchars($route['loc']) . '"/>' . PHP_EOL;
            $xml .= '        <xhtml:link rel="alternate" hreflang="en" href="' . htmlspecialchars($route['loc']) . '"/>' . PHP_EOL;
            $xml .= '    </url>' . PHP_EOL;
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
