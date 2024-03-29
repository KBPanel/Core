<?php

namespace PHPBotts\Core\Entities;

use PHPBotts\Core\Entities\InlineQuery\InlineQueryResult;
use PHPBotts\Core\Request;

/**
 * Class InlineQuery
 *
 * @link https://core.telegram.org/bots/api#inlinequery
 *
 * @method string   getId()       Unique identifier for this query
 * @method User     getFrom()     Sender
 * @method Location getLocation() Optional. Sender location, only for bots that request user location
 * @method string   getQuery()    Text of the query (up to 512 characters)
 * @method string   getOffset()   Offset of the results to be returned, can be controlled by the bot
 * @method string   getChatType() Optional. Type of the chat, from which the inline query was sent. Can be either “sender” for a private chat with the inline query sender, “private”, “group”, “supergroup”, or “channel”. The chat type should be always known for requests sent from official clients and most third-party clients, unless the request was sent from a secret chat
 */
class InlineQuery extends Entity
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

    /**
     * Answer this inline query with the passed results.
     *
     * @param InlineQueryResult[] $results
     * @param array               $data
     *
     * @return ServerResponse
     */
    public function answer(array $results, array $data = []): ServerResponse
    {
        return Request::answerInlineQuery(array_merge([
            'inline_query_id' => $this->getId(),
            'results'         => $results,
        ], $data));
    }
}
