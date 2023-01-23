<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Trail;
use App\Models\Group;
use App\Models\TrailDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'id'    => 1,
            'name'  => 'Sameer Nyaupane',
            'email' => 'sameernyaupane@gmail.com',
        ]);

        User::factory()->create([
            'id'    => 2,
            'name'  => 'Rajb Tamang',
            'email' => 'rajibtamang42@gmail.com',
        ]);

        Role::factory()->create([
            'id'    => 1,
            'name'  => 'Admin',
        ]);

        Role::factory()->create([
            'id'    => 2,
            'name'  => 'User',
        ]);

        DB::table('role_user')->insert([
            [
                'user_id' => 1,
                'role_id' => 1,
            ],
            [
                'user_id' => 2,
                'role_id' => 2,
            ]
        ]);

        $trails = [
            [
                'id'          => 1,
                'title'       => 'Shivapuri Bishnudwar Hike',
                'description' => "Bishnudwar is the origin of the Bishnumati River, one of Kathmandu's most important rivers. Bishnumati is also religiously significant. Both Hindus and Buddhists regard this river as sacred. Bishnudwar, located on the Shivapuri National Park trail, is one of the most convenient and quick refreshment destinations in the bustling and busy city of Kathmandu. The pleasant trail and eye-catching greenery add to this hiking route.  The hike is around 2 to 3 hrs. Anyone with a basic level of hiking experience can explore this area.",
                'thumbnail'   => 'thumbnails/bishnudwar.jpg',
                'user_id'     => 1,
            ],
            [
                'id'          => 2,
                'title'       => 'Phulchowki Trail Hike',
                'description' => "The highest hill situated in the south of Kathmandu valley famous for Vegetation (Botanical Garden) and bird watching. Hike to Phulchowki Kathmandu is one of the most beautiful hiking related to vegetation around Kathmandu valley. To start our hike to Phulchowki Kathmandu, we drive 14 km south of Kathmandu for about 40 minutes by private Car. After we reach Godavari (with Botanical Garden) we start our hiking gradually uphill through dense sub – Tropical forest for four hours.",
                'thumbnail'   => 'thumbnails/phulchowki.jpeg',
                'user_id'     => 1,
            ],
            [
                'id'          => 3,
                'title'       => 'Champadevi Trail Hike',
                'description' => "The Champadevi Hike is the best way to get one with nature. First of all, the trip begins from Kathmandu and heads to Bhanjyang on a short drive. The hike slowly rises along the trail through dense forest filled with a variety of plants and flowers. During the Champadevi Hike, the hike features even more mesmerizing Bagmati River, Bungmati, Khokana, and Pharping. You can also come across several Buddhist monasteries on the way to the top. Next, you reach the top of the Champadevi hill.",
                'thumbnail'   => 'thumbnails/champadevi.jpg',
                'user_id'     => 1,
            ],
            [
                'id'          => 4,
                'title'       => 'Lakuri Bhanjyang Hike',
                'description' => "Lakuri Bhanjyang is a sweet escape from the busy capital with an opportunity to explore engaging and exciting countryside lifestyle. Initially, you will drive to Lamatar through Gwarko, which should take about an hour. From Lamatar, you can hike uphill either through a motor road or a steep foothill trail. Both of these paths will merge into one after walking up for a while. Lakuri Bhanjyang is about 13 kilometers away from Gwarko, and thus you will be walking for about 3 hours from Lamatar. From the viewpoint, you will get to see the three cities of Kathmandu valley, Kathmandu, Lalitpur, and Bhaktapur, along with with some of the peaks of the Langtang and Gaurishankar range.",
                'thumbnail'   => 'thumbnails/lakuri-bhanjyang.jpg',
                'user_id'     => 1,
            ],
            [
                'id'          => 5,
                'title'       => 'Chisapani Hiking Trail',
                'description' => "The literature meaning of the “Chispani” is cold water. Nepali word “Chiso,” meaning cold and “Pani” means water. Chispani trek (2140) is one of the shortest and popular trek viewing spectacular snowcap mountain, green hill terraces, national park jungle with the beautiful Nepali village. This trek allows you to explore two days walking around Shivapuri National and Nagarkot, which is the nearest popular touristic hill station from Kathmandu. This trek is ideally suitable for short time traveler with 2-3 days who wish to explore Nepal within a short time frame. ",
                'thumbnail'   => 'thumbnails/chisapani.jpeg',
                'user_id'     => 1,
            ],
        ];

        $trailDetails = [
            [
                'trail_id'           => 1,
                'difficulty'         => 'Easy',
                'elevation'          => '1917 m',
                'elevation_rating'   => 'Medium',
                'distance'           => '3.1 km',
                'distance_rating'    => 'Short',
                'estimated_time'     => '0 hr 58 m',
                'accomodation1'      => 'Shivapuri Heights Cottage',
                'accomodation1_cost' => '10385',
                'accomodation2'      => 'Meraki Wellness Retreat',
                'accomodation2_cost' => '15343',
                'accomodation3'      => 'Natural View Resort',
                'accomodation3_cost' => '2300',
                'map_url'            => 'https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d13911.834724647559!2d85.36220242374861!3d27.79411969211038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e2!4m5!1s0x39eb1de9c3d5ff25%3A0x5709d39b62c848f!2sMuhan%20pokhari%2C%20Shivapuri%20Headquarter%2C%20Muhanpokhari%2C%20shivapuri%20road%2C%20Budhanilkantha%2044600!3m2!1d27.791409899999998!2d85.3711895!4m5!1s0x39eb1f1f59436f1b%3A0x78c7ddbcf155524b!2sBishnudwar%20Waterfall%2C%20Budhanilkantha!3m2!1d27.79439!2d85.3555241!5e0!3m2!1sen!2snp!4v1674385841951!5m2!1sen!2snp',
            ],
            [
                'trail_id'           => 2,
                'difficulty'         => 'Hard',
                'elevation'          => '2754 m',
                'elevation_rating'   => 'High',
                'distance'           => '3.1 km',
                'distance_rating'    => 'Long',
                'estimated_time'     => '2 hr 32 m',
                'accomodation1'      => 'Shivapuri Heights Cottage',
                'accomodation1_cost' => '10385',
                'accomodation2'      => 'Meraki Wellness Retreat',
                'accomodation2_cost' => '15343',
                'accomodation3'      => 'Natural View Resort',
                'accomodation3_cost' => '2300',
                'map_url'            => '',
            ],
            [
                'trail_id'           => 3,
                'difficulty'         => 'Easy',
                'elevation'          => '1969 m',
                'elevation_rating'   => 'Medium',
                'distance'           => '3.9 km',
                'distance_rating'    => 'Long',
                'estimated_time'     => '1 hr 14 m',
                'accomodation1'      => 'Shivapuri Heights Cottage',
                'accomodation1_cost' => '10385',
                'accomodation2'      => 'Meraki Wellness Retreat',
                'accomodation2_cost' => '15343',
                'accomodation3'      => 'Natural View Resort',
                'accomodation3_cost' => '2300',
                'map_url'            => '',
            ],
            [
                'trail_id'           => 4,
                'difficulty'         => 'Normal',
                'elevation'          => '1992 m',
                'elevation_rating'   => 'Medium',
                'distance'           => '6.2 km',
                'distance_rating'    => 'Long',
                'estimated_time'     => '1 hr 44 m',
                'accomodation1'      => 'Shivapuri Heights Cottage',
                'accomodation1_cost' => '10385',
                'accomodation2'      => 'Meraki Wellness Retreat',
                'accomodation2_cost' => '15343',
                'accomodation3'      => 'Natural View Resort',
                'accomodation3_cost' => '2300',
                'map_url'            => '',
            ],
            [
                'trail_id'           => 5,
                'difficulty'         => 'Hard',
                'elevation'          => '2184 m',
                'elevation_rating'   => 'Medium',
                'distance'           => '15 km',
                'distance_rating'    => 'Long',
                'estimated_time'     => '3 hr 55 m',
                'accomodation1'      => 'Shivapuri Heights Cottage',
                'accomodation1_cost' => '10385',
                'accomodation2'      => 'Meraki Wellness Retreat',
                'accomodation2_cost' => '15343',
                'accomodation3'      => 'Natural View Resort',
                'accomodation3_cost' => '2300',
                'map_url'            => '',
            ],
        ];

        $groups = [
            [
                'name'        => 'Hikers Group',
                'description' => "We are looking for members to take on Langtang Trek together.",
                'thumbnail'   => '',
                'user_id'     => 1,
            ],
            [
                'name'        => 'Nepal Hikers',
                'description' => "Desc",
                'thumbnail'   => '',
                'user_id'     => 1,
            ],
            [
                'name'        => 'Hikes Team',
                'description' => "Desc.",
                'thumbnail'   => '',
                'user_id'     => 1,
            ],
            [
                'name'        => 'Elevation Hikers',
                'description' => "Desc",
                'thumbnail'   => '',
                'user_id'     => 1,
            ],
            [
                'name'        => 'Mountain Adventurers',
                'description' => "Desc",
                'thumbnail'   => '',
                'user_id'     => 1,
            ],
        ];

        foreach($trails as $trail) {
            Trail::factory()->create($trail);
        }

        foreach($groups as $group) {
            Group::factory()->create($group);
        }

        foreach($trailDetails as $trailDetail) {
            TrailDetail::factory()->create($trailDetail);
        }
    }
}
