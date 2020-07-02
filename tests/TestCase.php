<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    public $baseUrl = 'http://esto.test';

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }
}
