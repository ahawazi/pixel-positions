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

    $this->jobs = Job::factory()->count(3)->for($this->employer)->create();

    $this->jobs->each(function ($job) {
        $job->tag('Tech');
    });
});

it('displays the job index page', function () {
    get(route('job.index'))
        ->assertSee($this->jobs->first()->title)
        ->assertSee($this->jobs->first()->salary)
        ->assertSee($this->jobs->first()->url)
        ->assertSee($this->jobs->first()->tags->first()->name)
        ->assertSee($this->jobs->first()->employer->logo)
        ->assertSee($this->jobs->first()->employer->name);
});
