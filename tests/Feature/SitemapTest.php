<?php

namespace Tests\Feature;

use Tests\TestCase;

class SitemapTest extends TestCase
{
    /**
     * Test the sitemap endpoint returns valid XML with all public pages.
     */
    public function test_sitemap_returns_valid_xml_with_all_pages(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');

        $content = $response->getContent();

        $this->assertStringContainsString('<?xml version="1.0" encoding="UTF-8"?>', $content);
        $this->assertStringContainsString('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">', $content);

        foreach (['/', '/menu', '/about', '/feature', '/gallery', '/team', '/contact'] as $path) {
            $this->assertStringContainsString('<loc>'.url($path).'</loc>', $content);
        }

        $this->assertSame(7, substr_count($content, '<url>'));
    }

    /**
     * Test the sitemap no longer emits invalid hreflang alternates.
     */
    public function test_sitemap_does_not_contain_hreflang_alternates(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $this->assertStringNotContainsString('xhtml:link', $response->getContent());
        $this->assertStringNotContainsString('hreflang', $response->getContent());
    }
}
