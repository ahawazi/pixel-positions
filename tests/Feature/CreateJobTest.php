<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;

use function Pest\Laravel\be;
use function Pest\Laravel\post;

beforeEach(function () {
    $this->user = User::factory()->create();

    $this->employer = Employer::factory()->for($this->user)->create();

    be($this->user);

    $this->attributes = [
        'title' => 'Senior Developer',
        'salary' => '$100,000 USD',
        'location' => 'Remote',
        'schedule' => 'Full Time',
        'url' => 'https://example.com',
        'tags' => 'Tech, Remote',
        'featured' => true,
    ];
});

it('creates a job', function () {

    post(route('job.store'), $this->attributes)

        ->assertSessionHasNoErrors()
        ->assertRedirect(route('job.index'));

    $this->assertDatabaseHas('jobs', [
        'title' => 'Senior Developer',
        'salary' => '$100,000 USD',
        'location' => 'Remote',
        'schedule' => 'Full Time',
        'url' => 'https://example.com',
        'featured' => true,
        'employer_id' => $this->employer->id,
    ]);

    $job = Job::where('title', 'Senior Developer')->first();

    // Verify tags are attached
    $this->assertTrue($job->tags->contains('name', 'Tech'));
    $this->assertTrue($job->tags->contains('name', 'Remote'));

    $this->withoutExceptionHandling();
});

it('validates the job creation request', function () {

    post(route('job.store'), [])

        ->assertSessionHasErrors([
            'title',
            'salary',
            'location',
            'schedule',
            'url',
        ]);
});

it('validates the schedule field correctly', function () {

    post(route('job.store'), [
        'title' => 'Senior Developer',
        'salary' => '$100,000 USD',
        'location' => 'Remote',
        'schedule' => 'InvalidSchedule', // Invalid value
        'url' => 'https://example.com',
    ])

        ->assertSessionHasErrors(['schedule']);
});
