<?php

namespace PHPBotts\Core\Entities\InlineQuery;

use PHPBotts\Core\Entities\InlineKeyboard;
use PHPBotts\Core\Entities\InputMessageContent\InputMessageContent;

/**
 * Class InlineQueryResultGif
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultgif
 *
 * <code>
 * $data = [
 *   'id'                    => '',
 *   'gif_url'               => '',
 *   'gif_width'             => 30,
 *   'gif_height'            => 30,
 *   'thumb_url'             => '',
 *   'title'                 => '',
 *   'caption'               => '',
 *   'reply_markup'          => <InlineKeyboard>,
 *   'input_message_content' => <InputMessageContent>,
 * ];
 * </code>
 *
 * @method string               getType()                Type of the result, must be gif
 * @method string               getId()                  Unique identifier for this result, 1-64 bytes
 * @method string               getGifUrl()              A valid URL for the GIF file. File size must not exceed 1MB
 * @method int                  getGifWidth()            Optional. Width of the GIF
 * @method int                  getGifHeight()           Optional. Height of the GIF
 * @method int                  getGifDuration()         Optional. Duration of the GIF
 * @method string               getThumbUrl()            URL of the static thumbnail for the result (jpeg or gif)
 * @method string               getTitle()               Optional. Title for the result
 * @method string               getCaption()             Optional. Caption of the GIF file to be sent, 0-200 characters
 * @method string               getParseMode()           Optional. Mode for parsing entities in the caption
 * @method MessageEntity[]      getCaptionEntities()     Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method InlineKeyboard       getReplyMarkup()         Optional. Inline keyboard attached to the message
 * @method InputMessageContent  getInputMessageContent() Optional. Content of the message to be sent instead of the GIF animation
 *
 * @method $this setId(string $id)                                                  Unique identifier for this result, 1-64 bytes
 * @method $this setGifUrl(string $gif_url)                                         A valid URL for the GIF file. File size must not exceed 1MB
 * @method $this setGifWidth(int $gif_width)                                        Optional. Width of the GIF
 * @method $this setGifHeight(int $gif_height)                                      Optional. Height of the GIF
 * @method $this setGifDuration(int $gif_duration)                                  Optional.  Duration of the GIF
 * @method $this setThumbUrl(string $thumb_url)                                     URL of the static thumbnail for the result (jpeg or gif)
 * @method $this setTitle(string $title)                                            Optional. Title for the result
 * @method $this setCaption(string $caption)                                        Optional. Caption of the GIF file to be sent, 0-200 characters
 * @method $this setParseMode(string $parse_mode)                                   Optional. Mode for parsing entities in the caption
 * @method $this setCaptionEntities(array $caption_entities)                        Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method $this setReplyMarkup(InlineKeyboard $reply_markup)                       Optional. Inline keyboard attached to the message
 * @method $this setInputMessageContent(InputMessageContent $input_message_content) Optional. Content of the message to be sent instead of the GIF animation
 */
class InlineQueryResultGif extends InlineEntity implements InlineQueryResult
{
    /**
     * InlineQueryResultGif constructor
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $data['type'] = 'gif';
        parent::__construct($data);
    }
}
