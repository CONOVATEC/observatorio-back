<?php

namespace Spatie\Ignition\Solutions;

use Illuminate\Contracts\Support\Arrayable;
use Spatie\Ignition\Contracts\Solution;

/** @implements Arrayable<string, array<string,string>|string|false> */
class SolutionTransformer implements Arrayable
{
    protected Solution $solution;

    public function __construct(Solution $solution)
    {
        $this->solution = $solution;
    }

    /** @return array<string, array<string,string>|string|false> */
    public function toArray(): array
    {
        return [
            'class' => get_class($this->solution),
            'title' => $this->solution->getSolutionTitle(),
            'links' => $this->solution->getDocumentationLinks(),
            'description' => $this->solution->getSolutionDescription(),
            'is_runnable' => false,
<<<<<<< HEAD
            'ai_generated' => $this->solution->aiGenerated ?? false,
=======
>>>>>>> e53e303c6cc827072ac019a4cb7508cf19c59ccf
        ];
    }
}
