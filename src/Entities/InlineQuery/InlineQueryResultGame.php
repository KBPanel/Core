<?php

namespace PHPBotts\Core\Entities\InlineQuery;

use PHPBotts\Core\Entities\InlineKeyboard;

/**
 * Class InlineQueryResultGame
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultgame
 *
 * <code>
 * $data = [
 *   'id'              => '',
 *   'game_short_name' => '',
 *   'reply_markup'    => <InlineKeyboard>,
 * ];
 * </code>
 *
 * @method string         getType()          Type of the result, must be game
 * @method string         getId()            Unique identifier for this result, 1-64 bytes
 * @method string         getGameShortName() Short name of the game
 * @method InlineKeyboard getReplyMarkup()   Optional. Inline keyboard attached to the message
 *
 * @method $this setId(string $id)                            Unique identifier for this result, 1-64 bytes
 * @method $this setGameShortName(string $game_short_name)    Short name of the game
 * @method $this setReplyMarkup(InlineKeyboard $reply_markup) Optional. Inline keyboard attached to the message
 */
class InlineQueryResultGame extends InlineEntity implements InlineQueryResult
{
    /**
     * InlineQueryResultGame constructor
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $data['type'] = 'game';
        parent::__construct($data);
    }
}
