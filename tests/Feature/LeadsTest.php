<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LeadsTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_should_successfully_create_a_lead()
    {
        $response = $this->postJson(route('leads.store'), [
            'title' => 'This will be the lead title',
            'description' => 'This is the lead description',
        ]);

        $response->assertCreated();

        $this->assertDatabaseHas('leads', [
            'title' => 'This will be the lead title',
            'description' => 'This is the lead description',
        ]);
    }

    public function test_it_should_return_an_error_when_required_fields_are_not_provided(): void
    {
        $response = $this->postJson(route('leads.store'), [
            'title' => '',
            'description' => '',
        ]);

        $response->assertUnprocessable();
    }

}
