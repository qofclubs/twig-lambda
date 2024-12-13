<?php

namespace DPolac\TwigLambda\Tests;

use DPolac\TwigLambda\LambdaExtension;

class IntegrationTest extends \Twig_Test_IntegrationTestCase
{

    public function getExtensions()
    {
        return [new LambdaExtension()];
    }

    public function getFixturesDir()
    {
        return __DIR__.'/Fixtures/';
    }
}
