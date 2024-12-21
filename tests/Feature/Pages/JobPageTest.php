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


