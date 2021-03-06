<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please View the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\VarDumper\Caster;

/**
 * Represents a single backtrace frame as returned by debug_backtrace() or InputException->getTrace().
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class FrameStub extends EnumStub
{
    public $keepArgs;
    public $inTraceStub;

    public function __construct(array $frame, bool $keepArgs = true, bool $inTraceStub = false)
    {
        $this->value = $frame;
        $this->keepArgs = $keepArgs;
        $this->inTraceStub = $inTraceStub;
    }
}
