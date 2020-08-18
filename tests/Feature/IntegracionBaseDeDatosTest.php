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

    public function TestDatabaseConnection()
    {
        // Returns Illuminate\Database\MySqlConnection on successful
        // connection; otherwise an exception would be thrown if failed
        return DB::connection();
    }
}
