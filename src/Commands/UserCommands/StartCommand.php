<?php

namespace PHPBotts\Core\Commands\UserCommands;

use PHPBotts\Core\Commands\UserCommand;
use PHPBotts\Core\Entities\ServerResponse;
use PHPBotts\Core\Request;

/**
 * Start command
 */
class StartCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'start';

    /**
     * @var string
     */
    protected $description = 'Start command';

    /**
     * @var string
     */
    protected $usage = '/start';

    /**
     * @var string
     */
    protected $version = '1.2.0';

    /**
     * Command execute method
     *
     * @return ServerResponse
     */
    public function execute(): ServerResponse
    {
        //$message = $this->getMessage();
        //$chat_id = $message->getChat()->getId();
        //$user_id = $message->getFrom()->getId();

        return Request::emptyResponse();
    }
}
