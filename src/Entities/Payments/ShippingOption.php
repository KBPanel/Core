<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Entities\Payments;

    use KSeven\TelegramBot\Entities\Entity;

    /**
     * Class ShippingOption
     *
     * This object represents one shipping option.
     *
     * @link https://core.telegram.org/bots/api#shippingoption
     *
     * @method string         getId()     Shipping option identifier
     * @method string         getTitle()  Option title
     * @method LabeledPrice[] getPrices() List of price portions
     **/
    class ShippingOption extends Entity
    {
        /**
         * {@inheritdoc}
         */
        protected function subEntities(): array
        {
            return [
                'prices' => [LabeledPrice::class],
            ];
        }
    }
