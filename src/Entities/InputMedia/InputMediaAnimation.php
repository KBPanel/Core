<?php

namespace PHPBotts\Core\Entities\InputMedia;

use PHPBotts\Core\Entities\Entity;

/**
 * Class InputMediaAnimation
 *
 * @link https://core.telegram.org/bots/api#inputmediaanimation
 *
 * <code>
 * $data = [
 *   'media'      => '123abc',
 *   'thumb'      => '456def',
 *   'caption'    => '*Animation* caption',
 *   'parse_mode' => 'markdown',
 *   'width'      => 200,
 *   'height'     => 150,
 *   'duration'   => 11,
 * ];
 * </code>
 *
 * @method string          getType()            Type of the result, must be animation
 * @method string          getMedia()           File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More info on Sending Files »
 * @method string          getThumb()           Optional. Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail‘s width and height should not exceed 90. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More info on Sending Files »
 * @method string          getCaption()         Optional. Caption of the animation to be sent, 0-200 characters
 * @method string          getParseMode()       Optional. Mode for parsing entities in the animation caption
 * @method MessageEntity[] getCaptionEntities() Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method int             getWidth()           Optional. Animation width
 * @method int             getHeight()          Optional. Animation height
 * @method int             getDuration()        Optional. Animation duration
 *
 * @method $this setMedia(string $media)                     File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More info on Sending Files »
 * @method $this setThumb(string $thumb)                     Optional. Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail‘s width and height should not exceed 90. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More info on Sending Files »
 * @method $this setCaption(string $caption)                 Optional. Caption of the animation to be sent, 0-200 characters
 * @method $this setParseMode(string $parse_mode)            Optional. Mode for parsing entities in the animation caption
 * @method $this setCaptionEntities(array $caption_entities) Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method $this setWidth(int $width)                        Optional. Animation width
 * @method $this setHeight(int $height)                      Optional. Animation height
 * @method $this setDuration(int $duration)                  Optional. Animation duration
 */
class InputMediaAnimation extends Entity implements InputMedia
{
    /**
     * InputMediaAnimation constructor
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $data['type'] = 'animation';
        parent::__construct($data);
    }
}
