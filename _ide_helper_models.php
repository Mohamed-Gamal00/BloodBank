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
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Client> $clients
 * @property-read int|null $clients_count
 * @method static \Illuminate\Database\Eloquent\Builder|BloodType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodType query()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodType whereUpdatedAt($value)
 */
	class BloodType extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $blood_type_id
 * @property int $client_id
 * @method static \Illuminate\Database\Eloquent\Builder|BloodtypeClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodtypeClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodtypeClient query()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodtypeClient whereBloodTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodtypeClient whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodtypeClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodtypeClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodtypeClient whereUpdatedAt($value)
 */
	class BloodtypeClient extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int $governorate_id
 * @property-read \App\Models\Governorate $governorate
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereGovernorateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property int $blood_type_id
 * @property string $last_donation_date
 * @property string $d_o_b
 * @property int $city_id
 * @property int $pin_code
 * @property string|null $api_token
 * @property-read \App\Models\BloodType $bloodType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BloodType> $blood_types
 * @property-read int|null $blood_types_count
 * @property-read \App\Models\City $city
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Governorate> $governorates
 * @property-read int|null $governorates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Notification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DonationRequest> $requests
 * @property-read int|null $requests_count
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereBloodTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereDOB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereLastDonationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $client_id
 * @property int $governorate_id
 * @method static \Illuminate\Database\Eloquent\Builder|ClientGovernorate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientGovernorate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientGovernorate query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientGovernorate whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientGovernorate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientGovernorate whereGovernorateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientGovernorate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientGovernorate whereUpdatedAt($value)
 */
	class ClientGovernorate extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $client_id
 * @property int $notification_id
 * @property int $is_read
 * @method static \Illuminate\Database\Eloquent\Builder|ClientNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientNotification whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientNotification whereIsRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientNotification whereNotificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientNotification whereUpdatedAt($value)
 */
	class ClientNotification extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $client_id
 * @property int $post_id
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPost query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPost whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPost wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPost whereUpdatedAt($value)
 */
	class ClientPost extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $patient_name
 * @property string $patient_phone
 * @property int $city_id
 * @property string $hospital_name
 * @property int $blood_type_id
 * @property int $patient_age
 * @property int $bags_num
 * @property string $hospital_address
 * @property string $details
 * @property string $latitude
 * @property string $longitude
 * @property int $client_id
 * @property-read \App\Models\City $city
 * @property-read \App\Models\Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest whereBagsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest whereBloodTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest whereHospitalAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest whereHospitalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest wherePatientAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest wherePatientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest wherePatientPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationRequest whereUpdatedAt($value)
 */
	class DonationRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\City> $cities
 * @property-read int|null $cities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Client> $clients
 * @property-read int|null $clients_count
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Governorate whereUpdatedAt($value)
 */
	class Governorate extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title
 * @property string $content
 * @property int $donation_requests_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Client> $client
 * @property-read int|null $client_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DonationRequest> $donationsRequest
 * @property-read int|null $donations_request_count
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereDonationRequestsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 */
	class Notification extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title
 * @property string $image
 * @property string $content
 * @property int $category_id
 * @property-read \App\models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Client> $clients
 * @property-read int|null $clients_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 */
	class Post extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $notification_settings_text
 * @property string $about_app
 * @property string $phone
 * @property string $email
 * @property string $fb_link
 * @property string $tw_link
 * @property string $insta_link
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAboutApp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFbLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereInstaLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereNotificationSettingsText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTwLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

