<?php

namespace PHPBotts\Core\Entities;

/**
 * Class ChosenInlineResult
 *
 * @link https://core.telegram.org/bots/api#choseninlineresult
 *
 * @method string   getResultId()        The unique identifier for the result that was chosen
 * @method User     getFrom()            The user that chose the result
 * @method Location getLocation()        Optional. Sender location, only for bots that require user location
 * @method string   getInlineMessageId() Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message. Will be also received in callback queries and can be used to edit the message.
 * @method string   getQuery()           The query that was used to obtain the result
 */
class ChosenInlineResult extends Entity
{
    /**
     * {@inheritdoc}
     */
    protected function subEntities(): array
    {
        return [
            'from'     => User::class,
            'location' => Location::class,
        ];
    }
}
