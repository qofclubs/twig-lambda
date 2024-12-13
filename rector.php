<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/NodeExpression',
        __DIR__ . '/Tests',
    ])
    // uncomment to reach your current PHP version
     ->withPhpSets(false, true)
    ->withTypeCoverageLevel(0)
    ->withDeadCodeLevel(1)
    ->withCodeQualityLevel(0);
