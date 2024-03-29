<?php

namespace Entities\TelegramPassport\PassportElementError;

use PHPBotts\Core\Entities\Entity;

/**
 * Class PassportElementErrorFrontSide
 *
 * Represents an issue with the front side of a document. The error is considered resolved when the file with the front side of the document changes.
 *
 * @link https://core.telegram.org/bots/api#passportelementerrorfrontside
 *
 * @method string getSource()   Error source, must be front_side
 * @method string getType()     The section of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”
 * @method string getFileHash() Base64-encoded hash of the file with the front side of the document
 * @method string getMessage()  Error message
 */
class PassportElementErrorFrontSide extends Entity implements PassportElementError
{
    /**
     * PassportElementErrorFrontSide constructor
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $data['source'] = 'front_side';
        parent::__construct($data);
    }
}
