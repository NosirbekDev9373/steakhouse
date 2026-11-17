<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactFormTest extends TestCase
{
    /**
     * Test the contact form renders with CSRF protection and the correct action.
     */
    public function test_contact_form_renders_with_csrf_and_action(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('name="_token"', false);
        $response->assertSee('action="' . route('contact.submit') . '"', false);
    }

    /**
     * Test a valid reservation request is accepted and flashes a success message.
     */
    public function test_contact_form_submits_with_valid_data(): void
    {
        $response = $this->from('/contact')->post('/contact', [
            'name' => 'Ali Valiyev',
            'email' => 'ali@example.com',
            'phone' => '+998901234567',
            'date' => '2026-12-01 19:00',
            'guests' => '2',
            'message' => 'I would like to reserve a table for two.',
        ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success', __('contact.form_success'));
    }

    /**
     * Test name, email and message are required while optional fields may be omitted.
     */
    public function test_contact_form_requires_name_email_and_message(): void
    {
        $response = $this->from('/contact')->post('/contact', [
            'name' => '',
            'email' => 'not-an-email',
            'message' => '',
        ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHasErrors(['name', 'email', 'message']);
        $response->assertSessionDoesntHaveErrors(['phone', 'date', 'guests']);
    }

    /**
     * Test invalid date and guest values are rejected while optional fields stay valid.
     */
    public function test_contact_form_rejects_invalid_date_and_guests(): void
    {
        $response = $this->from('/contact')->post('/contact', [
            'name' => 'Ali Valiyev',
            'email' => 'ali@example.com',
            'date' => 'not-a-date',
            'guests' => '999',
            'message' => 'I would like to reserve a table.',
        ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHasErrors(['date', 'guests']);
        $response->assertSessionDoesntHaveErrors(['name', 'email', 'message']);
    }

    /**
     * Test the contact endpoint is rate limited after 5 submissions per minute.
     */
    public function test_contact_form_is_rate_limited(): void
    {
        $headers = ['Accept' => 'application/json'];

        foreach (range(1, 5) as $i) {
            $this->from('/contact')->post('/contact', [
                'name' => "Guest {$i}",
                'email' => 'guest@example.com',
                'message' => 'Reservation request.',
            ], $headers)->assertRedirect('/contact');
        }

        $this->post('/contact', [
            'name' => 'Guest 6',
            'email' => 'guest@example.com',
            'message' => 'Reservation request.',
        ], $headers)->assertStatus(429);
    }

    /**
     * Test the success message is returned in the active locale.
     */
    public function test_contact_success_message_is_localized(): void
    {
        $response = $this->withSession(['locale' => 'en'])
            ->from('/contact')
            ->post('/contact', [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'message' => 'Table for two, please.',
            ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHas('success', __('contact.form_success', [], 'en'));
    }
}
