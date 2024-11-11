<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('allows authenticated users to access the home page', function () {
    $user = User::factory()->create();

    $response = actingAs($user)->get('/home');

    $response->assertStatus(200);
    $response->assertSee('billventory');
});

it('denies unauthenticated users access to the home page', function () {
    $response = get('/home');
    $response->assertRedirect('/login');
});
