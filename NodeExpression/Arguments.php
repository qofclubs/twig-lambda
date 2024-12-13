<?php
/**
 * This file is part of TwigLambda
 *
 * (c) Damian Polac <damian.polac.111@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DPolac\TwigLambda\NodeExpression;

use Twig\Compiler;
use Twig\Node\Expression\AbstractExpression;
use Twig\Node\Expression\NameExpression;
use Twig\Node\Node;

class Arguments extends AbstractExpression
{
    private array $arguments;

    public function __construct(Node $left, Node $right, $lineno)
    {
        $arguments = [];
        foreach ([$left, $right] as $node) {
            if ($node instanceof Arguments) {
                $arguments[] = $node->getArguments();
            } elseif ($node instanceof NameExpression) {
                $arguments[] = [$node->getAttribute('name')];
            } else {
                throw new \InvalidArgumentException('Invalid argument.');
            }
        }

        $this->arguments = array_merge($arguments[0], $arguments[1]);

        parent::__construct(['left' => $left, 'right' => $right], [], $lineno);
    }

    public function compile(Compiler $compiler)
    {
        throw new \Exception('Semicolon-separated list of arguments can be only used in lambda expression.');
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }
}
