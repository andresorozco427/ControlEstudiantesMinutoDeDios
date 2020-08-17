<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IntegracionBaseDeDatosTest extends TestCase
{
    public function testDatabase()
    {

        $this->assertDatabaseHas('tbl_departamentos', [
            'departamento' => 'ANTIOQUIA',
        ]);
    }
}
