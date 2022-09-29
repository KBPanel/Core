<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Entities\Games;

    use KSeven\TelegramBot\Entities\Entity;
    use KSeven\TelegramBot\Entities\User;

    /**
     * Class GameHighScore
     *
     * This object represents one row of the high scores table for a game.
     *
     * @link https://core.telegram.org/bots/api#gamehighscore
     *
     * @method int  getPosition() Position in high score table for the game
     * @method User getUser()     User
     * @method int  getScore()    Score
     **/
    class GameHighScore extends Entity
    {
        /**
         * {@inheritdoc}
         */
        protected function subEntities(): array
        {
            return [
                'user' => User::class,
            ];
        }
    }
