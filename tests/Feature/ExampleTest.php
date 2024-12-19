<?php

it('returns a successful response', function () {
    $response = $this->get(route('register'));

    $this->withoutExceptionHandling();
    $response->assertStatus(200);
});
