<?php

use SuiteCRM\Tests\SuiteCRM\Test\SuitePHPUnitFrameworkTestCase;

class PathsTest extends SuitePHPUnitFrameworkTestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var \SuiteCRM\Utility\Paths $paths
     */
    private static $paths;

    /**#
     * @var string $projectPath
     */
    private static $projectPath;

    protected function setUp(): void
    {
        parent::setUp();
        if (self::$paths === null) {
            self::$paths = new \SuiteCRM\Utility\Paths();
        }

        if (self::$projectPath === null) {
            self::$projectPath = dirname(dirname(dirname(dirname(dirname(dirname(__DIR__))))));
        }
    }

    public function testGetProjectPath(): void
    {
        $expected =  self::$projectPath;
        $actual = self::$paths->getProjectPath();
        self::assertEquals($expected, $actual);
    }

    public function testGetLibraryPath(): void
    {
        $expected =  self::$projectPath.'/lib';
        $actual = self::$paths->getLibraryPath();
        self::assertEquals($expected, $actual);
    }

    public function testGetContainersPath(): void
    {
        $expected =  self::$projectPath.'/lib/API/core/containers.php';
        $actual = self::$paths->getContainersFilePath();
        self::assertEquals($expected, $actual);
    }
}
