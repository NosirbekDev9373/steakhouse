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
        $files = ['navbar.php', 'menu.php', 'footer.php'];

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
        $files = ['navbar.php', 'menu.php', 'footer.php'];

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
        $files = ['navbar.php', 'menu.php', 'footer.php'];

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
}
