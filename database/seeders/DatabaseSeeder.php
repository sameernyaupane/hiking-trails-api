<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Trail;
use App\Models\Group;
use Illuminate\Database\Seeder;

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
            'name'  => 'Sameer Nyaupane',
            'email' => 'sameernyaupane@gmail.com',
        ]);

        $trails = [
            [
                'title'       => 'Shivapuri Bishnudwar Hike',
                'description' => "Bishnudwar is the origin of the Bishnumati River, one of Kathmandu's most important rivers. Bishnumati is also religiously significant. Both Hindus and Buddhists regard this river as sacred. Bishnudwar, located on the Shivapuri National Park trail, is one of the most convenient and quick refreshment destinations in the bustling and busy city of Kathmandu. The pleasant trail and eye-catching greenery add to this hiking route.  The hike is around 2 to 3 hrs. Anyone with a basic level of hiking experience can explore this area.",
                'thumbnail'   => 'thumbnails/bishnudwar.jpg'
            ],
            [
                'title'       => 'Phulchowki Trail Hike',
                'description' => "The highest hill situated in the south of Kathmandu valley famous for Vegetation (Botanical Garden) and bird watching. Hike to Phulchowki Kathmandu is one of the most beautiful hiking related to vegetation around Kathmandu valley. To start our hike to Phulchowki Kathmandu, we drive 14 km south of Kathmandu for about 40 minutes by private Car. After we reach Godavari (with Botanical Garden) we start our hiking gradually uphill through dense sub – Tropical forest for four hours.",
                'thumbnail'   => 'thumbnails/phulchowki.jpeg'
            ],
            [
                'title'       => 'Champadevi Trail Hike',
                'description' => "The Champadevi Hike is the best way to get one with nature. First of all, the trip begins from Kathmandu and heads to Bhanjyang on a short drive. The hike slowly rises along the trail through dense forest filled with a variety of plants and flowers. During the Champadevi Hike, the hike features even more mesmerizing Bagmati River, Bungmati, Khokana, and Pharping. You can also come across several Buddhist monasteries on the way to the top. Next, you reach the top of the Champadevi hill.",
                'thumbnail'   => 'thumbnails/champadevi.jpg'
            ],
            [
                'title'       => 'Lakuri Bhanjyang Hike',
                'description' => "Lakuri Bhanjyang is a sweet escape from the busy capital with an opportunity to explore engaging and exciting countryside lifestyle. Initially, you will drive to Lamatar through Gwarko, which should take about an hour. From Lamatar, you can hike uphill either through a motor road or a steep foothill trail. Both of these paths will merge into one after walking up for a while. Lakuri Bhanjyang is about 13 kilometers away from Gwarko, and thus you will be walking for about 3 hours from Lamatar. From the viewpoint, you will get to see the three cities of Kathmandu valley, Kathmandu, Lalitpur, and Bhaktapur, along with with some of the peaks of the Langtang and Gaurishankar range.",
                'thumbnail'   => 'thumbnails/lakuri-bhanjyang.jpg'
            ],
            [
                'title'       => 'Chisapani Hiking Trail',
                'description' => "The literature meaning of the “Chispani” is cold water. Nepali word “Chiso,” meaning cold and “Pani” means water. Chispani trek (2140) is one of the shortest and popular trek viewing spectacular snowcap mountain, green hill terraces, national park jungle with the beautiful Nepali village. This trek allows you to explore two days walking around Shivapuri National and Nagarkot, which is the nearest popular touristic hill station from Kathmandu. This trek is ideally suitable for short time traveler with 2-3 days who wish to explore Nepal within a short time frame. ",
                'thumbnail'   => 'thumbnails/chisapani.jpeg'
            ],
        ];

        $groups = [
            [
                'name'        => 'Hikers Group',
                'description' => "We are looking for members to take on Langtang Trek together.",
                'thumbnail'   => ''
            ],
            [
                'name'        => 'Nepal Hikers',
                'description' => "Desc",
                'thumbnail'   => ''
            ],
            [
                'name'        => 'Hikes Team',
                'description' => "Desc.",
                'thumbnail'   => ''
            ],
            [
                'name'        => 'Elevation Hikers',
                'description' => "Desc",
                'thumbnail'   => ''
            ],
            [
                'name'        => 'Mountain Adventurers',
                'description' => "Desc",
                'thumbnail'   => ''
            ],
        ];

        foreach($trails as $trail) {
            Trail::factory()->create($trail);
        }

        foreach($groups as $group) {
            Group::factory()->create($group);
        }
    }
}
