<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */
    
    namespace PHPBotts\Core\Tests\Unit\Entities;

    use PHPBotts\Core\Entities\Update;
    use PHPBotts\Core\Tests\Unit\TestCase;

    class ReplyToMessageTest extends TestCase
    {
        public function testChatType(): void
        {
            $json = '{
                "update_id":137809335,
                "message":{
                    "message_id":4479,
                    "from":{"id":123,"first_name":"John","username":"MJohn"},
                    "chat":{"id":-123,"title":"MyChat","type":"group"},
                    "date":1449092987,
                    "reply_to_message":{
                        "message_id":11,
                        "from":{"id":121,"first_name":"Myname","username":"mybot"},
                        "chat":{"id":-123,"title":"MyChat","type":"group"},
                        "date":1449092984,
                        "text":"type some text"
                    },
                    "text":"some text"
                }
            }';

            $update           = new Update(json_decode($json, true), 'mybot');
            $reply_to_message = $update->getMessage()->getReplyToMessage();

            self::assertNull($reply_to_message->getReplyToMessage());
        }
    }