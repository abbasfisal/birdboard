<?php

namespace Tests\Unit;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ProjectTest extends TestCase
{

    use RefreshDatabase;

    public function test_it_has_a_path()
    {

        $project = Project::factory()->create();

        $this->assertEquals('/project/' . $project->id, $project->path());
    }

    public function test_it_belogns_to_user()
    {
        $project = Project::factory()->create();

        $this->assertInstanceOf(User::class, $project->user);
    }
}