<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Agencia
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Agencia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agencia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agencia onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Agencia query()
 * @method static \Illuminate\Database\Eloquent\Builder|Agencia withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Agencia withoutTrashed()
 */
	class Agencia extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Chat
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Message> $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereUpdatedAt($value)
 */
	class Chat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClaseServicio
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ClaseServicio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaseServicio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaseServicio onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaseServicio query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaseServicio withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ClaseServicio withoutTrashed()
 */
	class ClaseServicio extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Empleado
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado query()
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado withoutTrashed()
 */
	class Empleado extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FormasPago
 *
 * @method static \Illuminate\Database\Eloquent\Builder|FormasPago newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormasPago newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormasPago onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FormasPago query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormasPago withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FormasPago withoutTrashed()
 */
	class FormasPago extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Message
 *
 * @property int $id
 * @property string $content
 * @property int $user_id
 * @property int $chat_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Chat|null $chat
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUserId($value)
 */
	class Message extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MonedaPago
 *
 * @method static \Illuminate\Database\Eloquent\Builder|MonedaPago newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MonedaPago newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MonedaPago onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MonedaPago query()
 * @method static \Illuminate\Database\Eloquent\Builder|MonedaPago withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MonedaPago withoutTrashed()
 */
	class MonedaPago extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Property
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property query()
 */
	class Property extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rate
 *
 * @property int $id
 * @property int|null $unit_id
 * @property int|null $zone_id
 * @property string|null $oneway
 * @property string|null $roundtrip
 * @property string|null $privateoneway
 * @property string|null $privateroundtrip
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Zone|null $zone
 * @method static \Illuminate\Database\Eloquent\Builder|Rate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereOneway($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate wherePrivateoneway($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate wherePrivateroundtrip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereRoundtrip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereZoneId($value)
 */
	class Rate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Reservation
 *
 * @property int $id
 * @property int $resort_id
 * @property int|null $user_id
 * @property int $location_start
 * @property int $location_end
 * @property int $unit_id
 * @property string|null $qr_image
 * @property string $voucher
 * @property string $fullname
 * @property string $email
 * @property string $type
 * @property string $phone
 * @property int $passengers
 * @property int|null $children
 * @property int|null $total_travelers
 * @property string|null $arrival_date
 * @property string|null $arrival_time
 * @property string|null $arrival_airline
 * @property string|null $arrival_flight
 * @property string|null $departure_date
 * @property string|null $departure_time
 * @property string|null $departure_airline
 * @property string|null $departure_flight
 * @property int $shopping_stop
 * @property int|null $booster_seat
 * @property int|null $car_seat
 * @property string|null $pickup_time
 * @property string|null $arrival_stop_time
 * @property string|null $arrival_stop_place
 * @property string|null $departure_stop_time
 * @property string|null $departure_stop_place
 * @property string|null $departure_pickup_time
 * @property string|null $comments
 * @property string|null $payment_type
 * @property string $subtotal
 * @property string $total
 * @property string $source
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Resort|null $resort
 * @property-read \App\Models\Unit|null $unit
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereArrivalAirline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereArrivalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereArrivalFlight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereArrivalStopPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereArrivalStopTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereArrivalTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereBoosterSeat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCarSeat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereChildren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDepartureAirline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDepartureDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDepartureFlight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDeparturePickupTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDepartureStopPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDepartureStopTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDepartureTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereLocationEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereLocationStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation wherePassengers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation wherePickupTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereQrImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereResortId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereShoppingStop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereTotalTravelers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereVoucher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation withoutTrashed()
 */
	class Reservation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Resort
 *
 * @property int $id
 * @property int $zone_id
 * @property string $name
 * @property string|null $description
 * @property string|null $meta_description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ResortImage> $images
 * @property-read int|null $images_count
 * @property-read \App\Models\Zone $zone
 * @method static \Illuminate\Database\Eloquent\Builder|Resort newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resort newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resort onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Resort query()
 * @method static \Illuminate\Database\Eloquent\Builder|Resort whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resort whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resort whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resort whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resort whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resort whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resort whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resort whereZoneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resort withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Resort withoutTrashed()
 */
	class Resort extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ResortImage
 *
 * @property int $id
 * @property int $resort_id
 * @property string $name
 * @property string $path
 * @property string|null $category
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Resort $resort
 * @method static \Illuminate\Database\Eloquent\Builder|ResortImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResortImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResortImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResortImage whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResortImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResortImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResortImage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResortImage wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResortImage whereResortId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResortImage whereUpdatedAt($value)
 */
	class ResortImage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tour
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $meta_description
 * @property string|null $duration
 * @property string|null $start_times
 * @property string|null $end_times
 * @property string|null $includes
 * @property string|null $cost
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TourImg> $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|Tour newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tour newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tour query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereEndTimes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereIncludes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereStartTimes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereUpdatedAt($value)
 */
	class Tour extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TourImg
 *
 * @property int $id
 * @property int $tour_id
 * @property string $name
 * @property string $path
 * @property string|null $category
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Tour $tour
 * @method static \Illuminate\Database\Eloquent\Builder|TourImg newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TourImg newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TourImg query()
 * @method static \Illuminate\Database\Eloquent\Builder|TourImg whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourImg whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourImg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourImg whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourImg wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourImg whereTourId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourImg whereUpdatedAt($value)
 */
	class TourImg extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Unit
 *
 * @property int $id
 * @property string $name
 * @property int|null $capacity
 * @property string|null $nombre
 * @property int|null $capacidad
 * @property string|null $picture
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereCapacidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit withoutTrashed()
 */
	class Unit extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Chat> $chats
 * @property-read int|null $chats_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Message> $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Visit
 *
 * @property int $id
 * @property int $visitor_id
 * @property string $device
 * @property string|null $location
 * @property string $browser
 * @property string|null $referer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Visitor $visitor
 * @method static \Illuminate\Database\Eloquent\Builder|Visit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Visit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Visit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereBrowser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereReferer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereVisitorId($value)
 */
	class Visit extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Visitor
 *
 * @property int $id
 * @property string $visitor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Visit> $visits
 * @property-read int|null $visits_count
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereVisitorId($value)
 */
	class Visitor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WordpressPost
 *
 * @property int $ID
 * @property int $post_author
 * @property string $post_date
 * @property string $post_date_gmt
 * @property string $post_content
 * @property string $post_title
 * @property string $post_excerpt
 * @property string $post_status
 * @property string $comment_status
 * @property string $ping_status
 * @property string $post_password
 * @property string $post_name
 * @property string $to_ping
 * @property string $pinged
 * @property string $post_modified
 * @property string $post_modified_gmt
 * @property string $post_content_filtered
 * @property int $post_parent
 * @property string $guid
 * @property int $menu_order
 * @property string $post_type
 * @property string $post_mime_type
 * @property int $comment_count
 * @property-read mixed $excerpt
 * @property-read mixed $meta_description
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WordpressPostMeta> $meta
 * @property-read int|null $meta_count
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost draft()
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost pending()
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost private()
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost published()
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost query()
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost whereCommentCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost whereCommentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost whereGuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost whereID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost whereMenuOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePingStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePinged($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePostAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePostContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePostContentFiltered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePostDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePostDateGmt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePostExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePostMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePostModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePostModifiedGmt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePostName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePostParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePostPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePostStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePostTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost wherePostType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPost whereToPing($value)
 */
	class WordpressPost extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WordpressPostMeta
 *
 * @property int $meta_id
 * @property int $post_id
 * @property string|null $meta_key
 * @property string|null $meta_value
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPostMeta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPostMeta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPostMeta query()
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPostMeta whereMetaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPostMeta whereMetaKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPostMeta whereMetaValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WordpressPostMeta wherePostId($value)
 */
	class WordpressPostMeta extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Zone
 *
 * @property int $id
 * @property int $zone
 * @property string|null $nombre
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Rate|null $price
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resort> $resorts
 * @property-read int|null $resorts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Zone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Zone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Zone onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Zone query()
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereZone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Zone withoutTrashed()
 */
	class Zone extends \Eloquent {}
}

