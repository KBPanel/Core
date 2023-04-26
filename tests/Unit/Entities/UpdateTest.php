<?php

    namespace PHPBotts\Core\Tests\Unit\Entities;

    use PHPBotts\Core\Entities\Update;
    use PHPBotts\Core\Tests\Unit\TestCase;

    class UpdateTest extends TestCase
    {
        public function testUpdateCast(): void
        {
            $json = '{
                "update_id":137809336,
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

            $struct = json_decode($json, true);
            $update = new Update($struct, 'mybot');

            $array_string_after = json_decode($update->toJson(), true);
            self::assertEquals($struct, $array_string_after);
        }
    }