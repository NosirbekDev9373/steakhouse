<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\App;
use Tests\TestCase;

class LanguageSwitchTest extends TestCase
{
    /**
     * Test switching to English sets session and redirects back.
     */
    public function test_switch_language_to_english(): void
    {
        $response = $this->from('/menu')->get('/lang/en');

        $response->assertRedirect('/menu');
        $response->assertSessionHas('locale', 'en');
    }

    /**
     * Test switching to Uzbek sets session and redirects back.
     */
    public function test_switch_language_to_uzbek(): void
    {
        $response = $this->from('/')->get('/lang/uz');

        $response->assertRedirect('/');
        $response->assertSessionHas('locale', 'uz');
    }

    /**
     * Test switching to unsupported language does not store unsupported locale in session.
     */
    public function test_switch_to_unsupported_language_is_ignored(): void
    {
        $response = $this->from('/')->get('/lang/ru');

        $response->assertRedirect('/');
        $this->assertNotEquals('ru', session('locale'));
    }

    /**
     * Test SetLocale middleware applies English locale and renders English translations.
     */
    public function test_set_locale_middleware_applies_english(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/');

        $response->assertStatus(200);
        $this->assertEquals('en', App::getLocale());
        $response->assertSee(__('navbar.home', [], 'en'));
        $response->assertSee(__('navbar.about', [], 'en'));
        $response->assertSee(__('navbar.menu', [], 'en'));
    }

    /**
     * Test SetLocale middleware applies Uzbek locale and renders Uzbek translations.
     */
    public function test_set_locale_middleware_applies_uzbek(): void
    {
        $response = $this->withSession(['locale' => 'uz'])->get('/');

        $response->assertStatus(200);
        $this->assertEquals('uz', App::getLocale());
        $response->assertSee(__('navbar.home', [], 'uz'));
        $response->assertSee(__('navbar.about', [], 'uz'));
        $response->assertSee(__('navbar.menu', [], 'uz'));
    }

    /**
     * Test menu page displays correct localized texts in Uzbek and English.
     */
    public function test_menu_page_renders_localized_content(): void
    {
        // Check Uzbek
        $responseUz = $this->withSession(['locale' => 'uz'])->get('/menu');
        $responseUz->assertStatus(200);
        $responseUz->assertSee(__('menu.title', [], 'uz'));
        $responseUz->assertSee(__('menu.filter_all', [], 'uz'));

        $uzCategories = __('menu.categories', [], 'uz');
        foreach ($uzCategories as $catName) {
            $responseUz->assertSee($catName);
        }

        // Check English
        $responseEn = $this->withSession(['locale' => 'en'])->get('/menu');
        $responseEn->assertStatus(200);
        $responseEn->assertSee(__('menu.title', [], 'en'));
        $responseEn->assertSee(__('menu.filter_all', [], 'en'));

        $enCategories = __('menu.categories', [], 'en');
        foreach ($enCategories as $catName) {
            $responseEn->assertSee($catName);
        }
    }

    /**
     * Test menu pagination controls and summary are properly localized.
     */
    public function test_menu_pagination_renders_localized_controls(): void
    {
        // Uzbek pagination controls
        $responseUz = $this->withSession(['locale' => 'uz'])->get('/menu');
        $responseUz->assertStatus(200);
        $responseUz->assertSee(__('menu.pagination_prev', [], 'uz'));
        $responseUz->assertSee(__('menu.pagination_next', [], 'uz'));
        $responseUz->assertSee(__('menu.pagination_showing', ['from' => 1, 'to' => 6, 'total' => 23], 'uz'));

        // English pagination controls
        $responseEn = $this->withSession(['locale' => 'en'])->get('/menu');
        $responseEn->assertStatus(200);
        $responseEn->assertSee(__('menu.pagination_prev', [], 'en'));
        $responseEn->assertSee(__('menu.pagination_next', [], 'en'));
        $responseEn->assertSee(__('menu.pagination_showing', ['from' => 1, 'to' => 6, 'total' => 23], 'en'));
    }

    /**
     * Test menu pagination and category query parameters update view correctly.
     */
    public function test_menu_pagination_query_parameters_apply_correctly(): void
    {
        // Page 2 request
        $responsePage2 = $this->withSession(['locale' => 'en'])->get('/menu?page=2');
        $responsePage2->assertStatus(200);
        $responsePage2->assertSee(__('menu.pagination_showing', ['from' => 7, 'to' => 12, 'total' => 23], 'en'));

        // Steaks category request
        $responseSteaks = $this->withSession(['locale' => 'en'])->get('/menu?category=steaks&page=1');
        $responseSteaks->assertStatus(200);
        $responseSteaks->assertSee(__('menu.pagination_showing', ['from' => 1, 'to' => 5, 'total' => 5], 'en'));
    }
}
