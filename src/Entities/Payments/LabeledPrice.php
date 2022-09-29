<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Entities\Payments;

    use KSeven\TelegramBot\Entities\Entity;

    /**
     * Class LabeledPrice
     *
     * This object represents a portion of the price for goods or services.
     *
     * @link https://core.telegram.org/bots/api#labeledprice
     *
     * @method string getLabel()  Portion label
     * @method int    getAmount() Price of the product in the smallest units of the currency (integer, not float/double).
     **/
    class LabeledPrice extends Entity
    {

    }