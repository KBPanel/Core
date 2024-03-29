<?php

namespace Entities\TelegramPassport\PassportElementError;

use PHPBotts\Core\Entities\Entity;

/**
 * Class PassportElementErrorTranslationFiles
 *
 * Represents an issue with a list of scans. The error is considered resolved when the list of files containing the scans changes.
 *
 * @link https://core.telegram.org/bots/api#passportelementerrortranslationfiles
 *
 * @method string   getSource()     Error source, must be translation_files
 * @method string   getType()       Type of element of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
 * @method string[] getFileHashes() List of base64-encoded file hashes
 * @method string   getMessage()    Error message
 */
class PassportElementErrorTranslationFiles extends Entity implements PassportElementError
{
    /**
     * PassportElementErrorTranslationFiles constructor
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $data['source'] = 'translation_files';
        parent::__construct($data);
    }
}
