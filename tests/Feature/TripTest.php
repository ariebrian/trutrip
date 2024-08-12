<?php

use App\Models\Trip;
use App\Models\User;
use Laravel\Passport\Passport;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

it('list trips', function () {
    $user = User::factory()->make([
        'email' => 'test@mai.com',
        'name' => 'test',
        'password' => '12345678',
    ]);
    Passport::actingAs($user);

    $response = $this->getJson('/api/trips');

    $response->assertStatus(200);
});

it('can create a trip', function () {
    $data = [
        'title' => 'Trip 1',
        'origin' => 'Origin 1',
        'destination' => 'Destination 1',
        'start_date' => '2024-08-13T00:00:00',
        'end_date' => '2024-08-13T23:00:00',
        'type_of_trip' => 'Single Day',
        'description' => 'test',
    ];

    $user = User::factory()->make([
        'email' => 'test@mai.com',
        'name' => 'test',
        'password' => '12345678',
    ]);
    Passport::actingAs($user);
    // 201 http created
    $response = $this->postJson('/api/trip',$data);
    $response->assertStatus(201);
});

it('can update a trip', function () {
    $trip = [
        'id' => 1,
        'title' => 'Trip 1',
        'origin' => 'Origin 1',
        'destination' => 'Destination 1',
        'start_date' => '2024-08-13T00:00:00',
        'end_date' => '2024-08-13T23:00:00',
        'type_of_trip' => 'Single Day',
        'description' => 'test',
    ];

    $user = User::factory()->make([
        'email' => 'test@mai.com',
        'name' => 'test',
        'password' => '12345678',
    ]);
    Passport::actingAs($user);

    $createdTrip = $this->postJson('/api/trip',$trip)->json();

    $data = [
        'title' => 'Trip 2',
        'origin' => 'Origin 2',
        'destination' => 'Destination 2',
        'start_date' => '2024-08-14T00:00:00',
        'end_date' => '2024-08-14T23:00:00',
        'type_of_trip' => 'Single Day',
        'description' => 'test1',
    ];

    $response = $this->putJson("/api/trip/{$createdTrip['id']}", $data);
    $response->assertStatus(200);
    $result = $response->json();
    expect($result)->title->toEqual($data['title']);
    expect($result)->origin->toEqual($data['origin']);
    expect($result)->destination->toEqual($data['destination']);
    expect($result)->type_of_trip->toEqual($data['type_of_trip']);
    expect($result)->description->toEqual($data['description']);
});

it('can delete a trip', function () {
    $trip = [
        'title' => 'Trip 1',
        'origin' => 'Origin 1',
        'destination' => 'Destination 1',
        'start_date' => '2024-08-13T00:00:00',
        'end_date' => '2024-08-13T23:00:00',
        'type_of_trip' => 'Single Day',
        'description' => 'test',
    ];

    $user = User::factory()->make([
        'email' => 'test@mai.com',
        'name' => 'test',
        'password' => '12345678',
    ]);
    Passport::actingAs($user);

    $createdTrip = $this->postJson('/api/trip',$trip)->json();

    $response = $this->deleteJson("/api/trip/{$createdTrip['id']}");
    $response->assertStatus(204);
});


