<?php

namespace App\Tests\Entity;

use App\Entity\Citizen;
use PHPUnit\Framework\TestCase;

class CitizenTest extends TestCase
{
    public function testSetName(): void
    {
        $citizen = new Citizen();
        $citizen->setName('John Doe');

        self::assertSame('John Doe', $citizen->getName());
    }

    public function testSetNis(): void
    {
        $citizen = new Citizen();
        $citizen->setNis('12345678901');

        self::assertSame('12345678901', $citizen->getNis());
    }

    public function testGenerateNis(): void
    {
        $citizen = new Citizen();
        $citizen->generateNis();

        $nis = $citizen->getNis();
        self::assertNotNull($nis);
        self::assertIsString($nis);
        self::assertGreaterThanOrEqual(10000000000, $nis);
        self::assertLessThanOrEqual(99999999999, $nis);
    }
}