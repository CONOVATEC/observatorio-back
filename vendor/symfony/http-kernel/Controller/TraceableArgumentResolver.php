<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class TraceableArgumentResolver implements ArgumentResolverInterface
{
    private $resolver;
    private $stopwatch;

    public function __construct(ArgumentResolverInterface $resolver, Stopwatch $stopwatch)
    {
        $this->resolver = $resolver;
        $this->stopwatch = $stopwatch;
    }

    /**
     * {@inheritdoc}
     */
    public function getArguments(Request $request, callable $controller): array
    {
        $e = $this->stopwatch->start('controller.get_arguments');

<<<<<<< HEAD
        $ret = $this->resolver->getArguments($request, $controller);

        $e->stop();

        return $ret;
=======
        try {
            return $this->resolver->getArguments($request, $controller, $reflector);
        } finally {
            $e->stop();
        }
>>>>>>> e53e303c6cc827072ac019a4cb7508cf19c59ccf
    }
}
