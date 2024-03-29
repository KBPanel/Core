<?php

namespace PHPBotts\Core\Entities\InlineQuery;

use PHPBotts\Core\Entities\InlineKeyboard;
use PHPBotts\Core\Entities\InputMessageContent\InputMessageContent;

/**
 * Class InlineQueryResultPhoto
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultphoto
 *
 * <code>
 * $data = [
 *   'id'                    => '',
 *   'photo_url'             => '',
 *   'thumb_url'             => '',
 *   'photo_width'           => 30,
 *   'photo_height'          => 30,
 *   'title'                 => '',
 *   'description'           => '',
 *   'caption'               => '',
 *   'reply_markup'          => <InlineKeyboard>,
 *   'input_message_content' => <InputMessageContent>,
 * ];
 * </code>
 *
 * @method string               getType()                Type of the result, must be photo
 * @method string               getId()                  Unique identifier for this result, 1-64 bytes
 * @method string               getPhotoUrl()            A valid URL of the photo. Photo must be in jpeg format. Photo size must not exceed 5MB
 * @method string               getThumbUrl()            URL of the thumbnail for the photo
 * @method int                  getPhotoWidth()          Optional. Width of the photo
 * @method int                  getPhotoHeight()         Optional. Height of the photo
 * @method string               getTitle()               Optional. Title for the result
 * @method string               getDescription()         Optional. Short description of the result
 * @method string               getCaption()             Optional. Caption of the photo to be sent, 0-200 characters
 * @method string               getParseMode()           Optional. Mode for parsing entities in the photo caption
 * @method MessageEntity[]      getCaptionEntities()     Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method InlineKeyboard       getReplyMarkup()         Optional. Inline keyboard attached to the message
 * @method InputMessageContent  getInputMessageContent() Optional. Content of the message to be sent instead of the photo
 *
 * @method $this setId(string $id)                                                  Unique identifier for this result, 1-64 bytes
 * @method $this setPhotoUrl(string $photo_url)                                     A valid URL of the photo. Photo must be in jpeg format. Photo size must not exceed 5MB
 * @method $this setThumbUrl(string $thumb_url)                                     URL of the thumbnail for the photo
 * @method $this setPhotoWidth(int $photo_width)                                    Optional. Width of the photo
 * @method $this setPhotoHeight(int $photo_height)                                  Optional. Height of the photo
 * @method $this setTitle(string $title)                                            Optional. Title for the result
 * @method $this setDescription(string $description)                                Optional. Short description of the result
 * @method $this setCaption(string $caption)                                        Optional. Caption of the photo to be sent, 0-200 characters
 * @method $this setParseMode(string $parse_mode)                                   Optional. Mode for parsing entities in the photo caption
 * @method $this setCaptionEntities(array $caption_entities)                        Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method $this setReplyMarkup(InlineKeyboard $reply_markup)                       Optional. Inline keyboard attached to the message
 * @method $this setInputMessageContent(InputMessageContent $input_message_content) Optional. Content of the message to be sent instead of the photo
 */
class InlineQueryResultPhoto extends InlineEntity implements InlineQueryResult
{
    /**
     * InlineQueryResultPhoto constructor
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $data['type'] = 'photo';
        parent::__construct($data);
    }
}
