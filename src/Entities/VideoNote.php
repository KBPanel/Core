<?php

namespace PHPBotts\Core\Entities;

/**
 * Class VideoNote
 *
 * @link https://core.telegram.org/bots/api#videonote
 *
 * @method string    getFileId()       Identifier for this file, which can be used to download or reuse the file
 * @method string    getFileUniqueId() Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @method int       getLength()       Video width and height as defined by sender
 * @method int       getDuration()     Duration of the audio in seconds as defined by sender
 * @method PhotoSize getThumb()        Optional. Video thumbnail as defined by sender
 * @method int       getFileSize()     Optional. File size
 */
class VideoNote extends Entity
{
    /**
     * {@inheritdoc}
     */
    protected function subEntities(): array
    {
        return [
            'thumb' => PhotoSize::class,
        ];
    }
}
