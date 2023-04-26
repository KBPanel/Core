<?php

namespace PHPBotts\Core\Commands;

abstract class AdminCommand extends Command
{
    /**
     * @var bool
     */
    protected $private_only = true;
}
