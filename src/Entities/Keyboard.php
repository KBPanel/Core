<?php

namespace PHPBotts\Core\Entities;

use PHPBotts\Core\Exception\TelegramException;

/**
 * Class Keyboard
 *
 * @link https://core.telegram.org/bots/api#replykeyboardmarkup
 *
 * @method bool   getResizeKeyboard()        Optional. Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller if there are just two rows of buttons). Defaults to false, in which case the custom keyboard is always of the same height as the app's standard keyboard.
 * @method bool   getOneTimeKeyboard()       Optional. Requests clients to remove the keyboard as soon as it's been used. The keyboard will still be available, but clients will automatically display the usual letter-keyboard in the chat – the user can press a special button in the input field to see the custom keyboard again. Defaults to false.
 * @method string getInputFieldPlaceholder() Optional. The placeholder to be shown in the input field when the keyboard is active; 1-64 characters
 * @method bool   getSelective()             Optional. Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
 *
 * @method $this setResizeKeyboard(bool $resize_keyboard)                  Optional. Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller if there are just two rows of buttons). Defaults to false, in which case the custom keyboard is always of the same height as the app's standard keyboard.
 * @method $this setOneTimeKeyboard(bool $one_time_keyboard)               Optional. Requests clients to remove the keyboard as soon as it's been used. The keyboard will still be available, but clients will automatically display the usual letter-keyboard in the chat – the user can press a special button in the input field to see the custom keyboard again. Defaults to false.
 * @method $this setInputFieldPlaceholder(string $input_field_placeholder) Optional. The placeholder to be shown in the input field when the keyboard is active; 1-64 characters
 * @method $this setSelective(bool $selective)                             Optional. Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
 */
class Keyboard extends Entity
{
    public function __construct()
    {
        $data = $this->createFromParams(...func_get_args());
        parent::__construct($data);

        // Remove any empty buttons.
        $this->{$this->getKeyboardType()} = array_filter($this->{$this->getKeyboardType()});
    }

    /**
     * If this keyboard is an inline keyboard.
     *
     * @return bool
     */
    public function isInlineKeyboard(): bool
    {
        return $this instanceof InlineKeyboard;
    }

    /**
     * Get the proper keyboard button class for this keyboard.
     *
     * @return string
     */
    public function getKeyboardButtonClass(): string
    {
        return $this->isInlineKeyboard() ? InlineKeyboardButton::class : KeyboardButton::class;
    }

    /**
     * Get the type of keyboard, either "inline_keyboard" or "keyboard".
     *
     * @return string
     */
    public function getKeyboardType(): string
    {
        return $this->isInlineKeyboard() ? 'inline_keyboard' : 'keyboard';
    }

    /**
     * If no explicit keyboard is passed, try to create one from the parameters.
     *
     * @return array
     */
    protected function createFromParams(): array
    {
        $keyboard_type = $this->getKeyboardType();

        $args = func_get_args();

        // Force button parameters into individual rows.
        foreach ($args as &$arg) {
            !is_array($arg) && $arg = [$arg];
        }
        unset($arg);

        $data = reset($args);

        if ($from_data = array_key_exists($keyboard_type, (array) $data)) {
            $args = $data[$keyboard_type];

            // Make sure we're working with a proper row.
            if (!is_array($args)) {
                $args = [];
            }
        }

        $new_keyboard = [];
        foreach ($args as $row) {
            $new_keyboard[] = $this->parseRow($row);
        }

        if (!empty($new_keyboard)) {
            if (!$from_data) {
                $data = [];
            }
            $data[$keyboard_type] = $new_keyboard;
        }

        // If $args was empty, $data still contains `false`
        return $data ?: [];
    }

    /**
     * Create a new row in keyboard and add buttons.
     *
     * @return Keyboard
     */
    public function addRow(): Keyboard
    {
        if (($new_row = $this->parseRow(func_get_args())) !== null) {
            $this->{$this->getKeyboardType()}[] = $new_row;
        }

        return $this;
    }

    /**
     * Parse a given row to the correct array format.
     *
     * @param array|string $row
     *
     * @return array|null
     */
    protected function parseRow($row): ?array
    {
        if (!is_array($row)) {
            return null;
        }

        $new_row = [];
        foreach ($row as $button) {
            if (($new_button = $this->parseButton($button)) !== null) {
                $new_row[] = $new_button;
            }
        }

        return $new_row;
    }

    /**
     * Parse a given button to the correct KeyboardButton object type.
     *
     * @param array|string|KeyboardButton $button
     *
     * @return KeyboardButton|null
     */
    protected function parseButton($button): ?KeyboardButton
    {
        $button_class = $this->getKeyboardButtonClass();

        if ($button instanceof $button_class) {
            return $button;
        }

        if (!$this->isInlineKeyboard() || call_user_func([$button_class, 'couldBe'], $button)) {
            return new $button_class($button);
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    protected function validate(): void
    {
        $keyboard_type = $this->getKeyboardType();
        $keyboard      = $this->getProperty($keyboard_type);

        if ($keyboard !== null) {
            if (!is_array($keyboard)) {
                throw new TelegramException($keyboard_type . ' field is not an array!');
            }

            foreach ($keyboard as $item) {
                if (!is_array($item)) {
                    throw new TelegramException($keyboard_type . ' subfield is not an array!');
                }
            }
        }
    }

    /**
     * Remove the current custom keyboard and display the default letter-keyboard.
     *
     * @link https://core.telegram.org/bots/api/#replykeyboardremove
     *
     * @param array $data
     *
     * @return Keyboard
     */
    public static function remove(array $data = []): Keyboard
    {
        return new static(array_merge(['keyboard' => [], 'remove_keyboard' => true, 'selective' => false], $data));
    }

    /**
     * Display a reply interface to the user (act as if the user has selected the bot's message and tapped 'Reply').
     *
     * @link https://core.telegram.org/bots/api#forcereply
     *
     * @param array $data
     *
     * @return Keyboard
     */
    public static function forceReply(array $data = []): Keyboard
    {
        return new static(array_merge(['keyboard' => [], 'force_reply' => true, 'selective' => false], $data));
    }
}
