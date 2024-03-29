<?php

namespace PHPBotts\Core\Entities\InputMessageContent;

use PHPBotts\Core\Entities\InlineQuery\InlineEntity;

/**
 * Class InputVenueMessageContent
 *
 * @link https://core.telegram.org/bots/api#inputvenuemessagecontent
 *
 * <code>
 * $data = [
 *   'latitude'        => 36.0338,
 *   'longitude'       => 71.8601,
 *   'title'           => '',
 *   'address'         => '',
 *   'foursquare_id'   => '',
 *   'foursquare_type' => '',
 * ];
 * </code>
 *
 * @method float  getLatitude()        Latitude of the location in degrees
 * @method float  getLongitude()       Longitude of the location in degrees
 * @method string getTitle()           Name of the venue
 * @method string getAddress()         Address of the venue
 * @method string getFoursquareId()    Optional. Foursquare identifier of the venue, if known
 * @method string getFoursquareType()  Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @method string getGooglePlaceId()   Optional. Google Places identifier of the venue
 * @method string getGooglePlaceType() Optional. Google Places type of the venue
 *
 * @method $this setLatitude(float $latitude)                  Latitude of the location in degrees
 * @method $this setLongitude(float $longitude)                Longitude of the location in degrees
 * @method $this setTitle(string $title)                       Name of the venue
 * @method $this setAddress(string $address)                   Address of the venue
 * @method $this setFoursquareId(string $foursquare_id)        Optional. Foursquare identifier of the venue, if known
 * @method $this setFoursquareType(string $foursquare_type)    Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @method $this setGooglePlaceId(string $google_place_id)     Optional. Google Places identifier of the venue
 * @method $this setGooglePlaceType(string $google_place_type) Optional. Google Places type of the venue
 */
class InputVenueMessageContent extends InlineEntity implements InputMessageContent
{

}
