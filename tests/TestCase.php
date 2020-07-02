<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
use Faker\Factory as Faker;
use Faker\Generator;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    public string $baseUrl = 'http://esto.test';
    public Generator $faker;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();

        $this->faker = Faker::create();
    }
}
