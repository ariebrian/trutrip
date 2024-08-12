<?php

use App\Models\Trip;

test('tripmodel', function () {
    expect(true)->toBeTrue();
});

it('has all required attributes', function () {
    $trip = new Trip([
        'title' => 'Trip 1',
        'origin' => 'Origin 1',
        'destination' => 'Destination 1',
        'start_date' => new DateTime('2024-08-13T00:00:00'),
        'end_date' => new DateTime('2024-08-13T23:00:00'),
        'type_of_trip' => 'Single Day',
    ]);
    expect($trip->title)->toBe('Trip 1');
    expect($trip->origin)->toBe('Origin 1');
    expect($trip->destination)->toBe('Destination 1');
    // expect($trip->start_date)->toBe(new DateTime('2024-08-13T00:00:00'));
    // expect($trip->end_date)->toBe(new DateTime('2024-08-13T23:00:00'));
    expect($trip->type_of_trip)->toBe('Single Day');
});
