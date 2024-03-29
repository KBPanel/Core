<?php

namespace PHPBotts\Core\Entities\InputMessageContent;

use PHPBotts\Core\Entities\InlineQuery\InlineEntity;

/**
 * Class InputContactMessageContent
 *
 * @link https://core.telegram.org/bots/api#inputcontactmessagecontent
 *
 * <code>
 * $data = [
 *   'phone_number' => '',
 *   'first_name'   => '',
 *   'last_name'    => '',
 *   'vcard'        => '',
 * ];
 * </code>
 *
 * @method string getPhoneNumber() Contact's phone number
 * @method string getFirstName()   Contact's first name
 * @method string getLastName()    Optional. Contact's last name
 * @method string getVcard()       Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
 *
 * @method $this setPhoneNumber(string $phone_number) Contact's phone number
 * @method $this setFirstName(string $first_name)     Contact's first name
 * @method $this setLastName(string $last_name)       Optional. Contact's last name
 * @method $this setVcard(string $vcard)              Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
 */
class InputContactMessageContent extends InlineEntity implements InputMessageContent
{

}
