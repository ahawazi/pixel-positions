<?php

use App\Models\Job;
use App\Models\User;
use App\Models\Employer;
use function Pest\Laravel\get;
use function Pest\Laravel\be;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->employer = Employer::factory()->for($this->user)->create();
    be($this->user);

    Job::factory()->count(3)->for($this->employer)->create([
        'title' => 'Laravel Developer',
        'featured' => true,
    ]);
});

it('displays the job index page with job titles', function () {
    $response = get(route('job.index'));

    $response->assertSee('Laravel Developer', false);
});

it('displays featured and non-featured jobs', function () {
    Job::factory()->count(2)->for($this->employer)->create([
        'title' => 'PHP Developer',
        'featured' => false,
    ]);

    $response = get(route('job.index'));

    $response->assertSee('Laravel Developer', false);
    $response->assertSee('PHP Developer', false);
});

