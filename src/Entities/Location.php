<?php

namespace PHPBotts\Core\Entities;

/**
 * Class Location
 *
 * @link https://core.telegram.org/bots/api#location
 *
 * @method float getLongitude()            Longitude as defined by sender
 * @method float getLatitude()             Latitude as defined by sender
 * @method float getHorizontalAccuracy()   Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 * @method int   getLivePeriod()           Optional. Time relative to the message sending date, during which the location can be updated, in seconds. For active live locations only.
 * @method int   getHeading()              Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
 * @method int   getProximityAlertRadius() Optional. Maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only.
 */
class Location extends Entity
{

}
