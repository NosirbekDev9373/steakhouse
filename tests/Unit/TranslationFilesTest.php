<?php

namespace Tests\Unit;

use Tests\TestCase;

class TranslationFilesTest extends TestCase
{
    /**
     * Test that required translation files exist in both uz and en directories.
     */
    public function test_translation_files_exist(): void
    {
        $files = [
            'navbar.php',
            'menu.php',
            'footer.php',
            'pagination.php',
            'seo.php',
            'about.php',
            'feature.php',
            'team.php',
            'gallery.php',
            'contact.php',
            'main.php',
        ];

        foreach ($files as $file) {
            $this->assertFileExists(base_path("lang/uz/{$file}"), "lang/uz/{$file} does not exist");
            $this->assertFileExists(base_path("lang/en/{$file}"), "lang/en/{$file} does not exist");
        }
    }

    /**
     * Test that translation keys between Uzbek and English match identically.
     */
    public function test_translation_keys_match_between_locales(): void
    {
        $files = [
            'navbar.php',
            'menu.php',
            'footer.php',
            'pagination.php',
            'seo.php',
            'about.php',
            'feature.php',
            'team.php',
            'gallery.php',
            'contact.php',
            'main.php',
        ];

        foreach ($files as $file) {
            $uzTranslations = require base_path("lang/uz/{$file}");
            $enTranslations = require base_path("lang/en/{$file}");

            $uzKeys = array_keys($uzTranslations);
            $enKeys = array_keys($enTranslations);

            sort($uzKeys);
            sort($enKeys);

            $this->assertEquals(
                $uzKeys,
                $enKeys,
                "Keys mismatch between lang/uz/{$file} and lang/en/{$file}"
            );
        }
    }

    /**
     * Test that translation values are not empty strings.
     */
    public function test_translations_are_not_empty(): void
    {
        $files = [
            'navbar.php',
            'menu.php',
            'footer.php',
            'pagination.php',
            'seo.php',
            'about.php',
            'feature.php',
            'team.php',
            'gallery.php',
            'contact.php',
            'main.php',
        ];

        foreach (['uz', 'en'] as $locale) {
            foreach ($files as $file) {
                $translations = require base_path("lang/{$locale}/{$file}");

                foreach ($translations as $key => $value) {
                    $this->assertNotEmpty(
                        $value,
                        "Translation value for key '{$key}' in lang/{$locale}/{$file} is empty"
                    );
                }
            }
        }
    }

    /**
     * Test that menu translations have all required categories and matching category keys.
     */
    public function test_menu_categories_exist_and_match(): void
    {
        $expectedCategories = ['steaks', 'starters', 'soups', 'sides', 'desserts', 'drinks'];

        $uzMenu = require base_path('lang/uz/menu.php');
        $enMenu = require base_path('lang/en/menu.php');

        $this->assertIsArray($uzMenu['categories']);
        $this->assertIsArray($enMenu['categories']);

        foreach ($expectedCategories as $cat) {
            $this->assertArrayHasKey($cat, $uzMenu['categories']);
            $this->assertArrayHasKey($cat, $enMenu['categories']);
            $this->assertNotEmpty($uzMenu['categories'][$cat]);
            $this->assertNotEmpty($enMenu['categories'][$cat]);
        }
    }

    /**
     * Test that all menu items have valid fields and their image files exist in public directory.
     */
    public function test_menu_items_have_valid_fields_and_existing_images(): void
    {
        foreach (['uz', 'en'] as $locale) {
            $menu = require base_path("lang/{$locale}/menu.php");
            $this->assertIsArray($menu['items']);
            $this->assertGreaterThanOrEqual(15, count($menu['items']));

            foreach ($menu['items'] as $item) {
                $this->assertArrayHasKey('id', $item);
                $this->assertArrayHasKey('name', $item);
                $this->assertArrayHasKey('category', $item);
                $this->assertArrayHasKey('category_name', $item);
                $this->assertArrayHasKey('price', $item);
                $this->assertArrayHasKey('description', $item);
                $this->assertArrayHasKey('image', $item);

                $this->assertNotEmpty($item['name']);
                $this->assertNotEmpty($item['price']);
                $this->assertNotEmpty($item['description']);
                $this->assertFileExists(public_path($item['image']), "Image file does not exist: {$item['image']}");
            }
        }
    }
}
