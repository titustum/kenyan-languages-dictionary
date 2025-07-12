<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\DictionaryMainEntry;

class DictionaryMainEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         // Fetch all categories once and index by name
        $categories = Category::all()->keyBy('name');

        // Keep track of which missing categories have already been reported
        $missingCategories = [];


        // Example entries to seed
        $entries = [

                // Greetings
                ['category' => 'Greetings', 'word_en' => 'Hello',            'image_path' => 'images/greetings/hello.png',            'icon' => '👋🏿'],
                ['category' => 'Greetings', 'word_en' => 'Goodbye',          'image_path' => 'images/greetings/goodbye.png',          'icon' => '👋🏿'],
                ['category' => 'Greetings', 'word_en' => 'Please',           'image_path' => 'images/greetings/please.png',           'icon' => '🙏🏿'],
                ['category' => 'Greetings', 'word_en' => 'Thank you',        'image_path' => 'images/greetings/thank_you.png',        'icon' => '🙏🏿'],
                ['category' => 'Greetings', 'word_en' => 'Yes',              'image_path' => 'images/greetings/yes.png',              'icon' => '👍🏿'],
                ['category' => 'Greetings', 'word_en' => 'No',               'image_path' => 'images/greetings/no.png',               'icon' => '👎🏿'],
                ['category' => 'Greetings', 'word_en' => 'Excuse me',        'image_path' => 'images/greetings/excuse_me.png',        'icon' => '🙇🏿‍♂️'],
                ['category' => 'Greetings', 'word_en' => 'Good morning',     'image_path' => 'images/greetings/good_morning.png',     'icon' => '🌅'],
                ['category' => 'Greetings', 'word_en' => 'Good evening',     'image_path' => 'images/greetings/good_evening.png',     'icon' => '🌇'],
                ['category' => 'Greetings', 'word_en' => 'Good night',       'image_path' => 'images/greetings/good_night.png',       'icon' => '🌙'],
                ['category' => 'Greetings', 'word_en' => 'How are you',     'image_path' => 'images/greetings/how_are_you.png',     'icon' => '🙂'],
                ['category' => 'Greetings', 'word_en' => 'Welcome',         'image_path' => 'images/greetings/welcome.png',         'icon' => '🤗'],
                ['category' => 'Greetings', 'word_en' => 'See you later',   'image_path' => 'images/greetings/see_you_later.png',   'icon' => '👋'],
                ['category' => 'Greetings', 'word_en' => 'Take care',       'image_path' => 'images/greetings/take_care.png',       'icon' => '🤗'],
                ['category' => 'Greetings', 'word_en' => 'Nice to meet you','image_path' => 'images/greetings/nice_to_meet_you.png','icon' => '🤝'],
                ['category' => 'Greetings', 'word_en' => 'Have a nice day', 'image_path' => 'images/greetings/have_a_nice_day.png', 'icon' => '😊'],
                ['category' => 'Greetings', 'word_en' => 'Cheers',          'image_path' => 'images/greetings/cheers.png',          'icon' => '🥂'],
                ['category' => 'Greetings', 'word_en' => 'Good afternoon',  'image_path' => 'images/greetings/good_afternoon.png',  'icon' => '🌞'],
                ['category' => 'Greetings', 'word_en' => 'What’s up',       'image_path' => 'images/greetings/whats_up.png',       'icon' => '🤔'],
                ['category' => 'Greetings', 'word_en' => 'Long time no see','image_path' => 'images/greetings/long_time_no_see.png','icon' => '⌛'],

                // Animals
                ['category' => 'Animals', 'word_en' => 'Dog',       'image_path' => 'images/animals/dog.png',       'icon' => '🐶'],
                ['category' => 'Animals', 'word_en' => 'Cat',       'image_path' => 'images/animals/cat.png',       'icon' => '🐱'],
                ['category' => 'Animals', 'word_en' => 'Bird',      'image_path' => 'images/animals/bird.png',      'icon' => '🐦'],
                ['category' => 'Animals', 'word_en' => 'Fish',      'image_path' => 'images/animals/fish.png',      'icon' => '🐟'],
                ['category' => 'Animals', 'word_en' => 'Horse',     'image_path' => 'images/animals/horse.png',     'icon' => '🐴'],
                ['category' => 'Animals', 'word_en' => 'Elephant',  'image_path' => 'images/animals/elephant.png',  'icon' => '🐘'],
                ['category' => 'Animals', 'word_en' => 'Lion',      'image_path' => 'images/animals/lion.png',      'icon' => '🦁'],
                ['category' => 'Animals', 'word_en' => 'Tiger',     'image_path' => 'images/animals/tiger.png',     'icon' => '🐯'],
                ['category' => 'Animals', 'word_en' => 'Bear',      'image_path' => 'images/animals/bear.png',      'icon' => '🐻'],
                ['category' => 'Animals', 'word_en' => 'Rabbit',    'image_path' => 'images/animals/rabbit.png',    'icon' => '🐰'],
                ['category' => 'Animals', 'word_en' => 'Zebra',     'image_path' => 'images/animals/zebra.png',     'icon' => '🦓'],
                ['category' => 'Animals', 'word_en' => 'Giraffe',   'image_path' => 'images/animals/giraffe.png',   'icon' => '🦒'],
                ['category' => 'Animals', 'word_en' => 'Monkey',    'image_path' => 'images/animals/monkey.png',    'icon' => '🐒'],
                ['category' => 'Animals', 'word_en' => 'Dolphin',   'image_path' => 'images/animals/dolphin.png',   'icon' => '🐬'],
                ['category' => 'Animals', 'word_en' => 'Wolf',      'image_path' => 'images/animals/wolf.png',      'icon' => '🐺'],
                ['category' => 'Animals', 'word_en' => 'Fox',       'image_path' => 'images/animals/fox.png',       'icon' => '🦊'],
                ['category' => 'Animals', 'word_en' => 'Deer',      'image_path' => 'images/animals/deer.png',      'icon' => '🦌'],
                ['category' => 'Animals', 'word_en' => 'Cow',       'image_path' => 'images/animals/cow.png',       'icon' => '🐮'],
                ['category' => 'Animals', 'word_en' => 'Pig',       'image_path' => 'images/animals/pig.png',       'icon' => '🐷'],
                ['category' => 'Animals', 'word_en' => 'Sheep',     'image_path' => 'images/animals/sheep.png',     'icon' => '🐑'],
                ['category' => 'Animals', 'word_en' => 'Goat',      'image_path' => 'images/animals/goat.png',      'icon' => '🐐'],
                ['category' => 'Animals', 'word_en' => 'Duck',      'image_path' => 'images/animals/duck.png',      'icon' => '🦆'],
                ['category' => 'Animals', 'word_en' => 'Chicken',   'image_path' => 'images/animals/chicken.png',   'icon' => '🐔'],
                ['category' => 'Animals', 'word_en' => 'Snake',     'image_path' => 'images/animals/snake.png',     'icon' => '🐍'],
                ['category' => 'Animals', 'word_en' => 'Spider',    'image_path' => 'images/animals/spider.png',    'icon' => '🕷️'],
                ['category' => 'Animals', 'word_en' => 'Bee',       'image_path' => 'images/animals/bee.png',       'icon' => '🐝'],
                ['category' => 'Animals', 'word_en' => 'Butterfly', 'image_path' => 'images/animals/butterfly.png', 'icon' => '🦋'],
                ['category' => 'Animals', 'word_en' => 'Frog',      'image_path' => 'images/animals/frog.png',      'icon' => '🐸'],
                ['category' => 'Animals', 'word_en' => 'Crab',      'image_path' => 'images/animals/crab.png',      'icon' => '🦀'],
                ['category' => 'Animals', 'word_en' => 'Octopus',   'image_path' => 'images/animals/octopus.png',   'icon' => '🐙'],
                ['category' => 'Animals', 'word_en' => 'Whale',     'image_path' => 'images/animals/whale.png',     'icon' => '🐋'],
                ['category' => 'Animals', 'word_en' => 'Eagle',     'image_path' => 'images/animals/eagle.png',     'icon' => '🦅'],
                ['category' => 'Animals', 'word_en' => 'Parrot',    'image_path' => 'images/animals/parrot.png',    'icon' => '🦜'],
                ['category' => 'Animals', 'word_en' => 'Crow',      'image_path' => 'images/animals/crow.png',      'icon' => '🐦'], // No direct crow emoji, using bird
                ['category' => 'Animals', 'word_en' => 'Hawk',      'image_path' => 'images/animals/hawk.png',      'icon' => '🦅'], // Using eagle emoji for hawk
                ['category' => 'Animals', 'word_en' => 'Seal',      'image_path' => 'images/animals/seal.png',      'icon' => '🦭'],
                ['category' => 'Animals', 'word_en' => 'Otter',     'image_path' => 'images/animals/otter.png',     'icon' => '🦦'],
                ['category' => 'Animals', 'word_en' => 'Raccoon',   'image_path' => 'images/animals/raccoon.png',   'icon' => '🦝'],
                ['category' => 'Animals', 'word_en' => 'Skunk',     'image_path' => 'images/animals/skunk.png',     'icon' => '🦨'],
                ['category' => 'Animals', 'word_en' => 'Lizard',    'image_path' => 'images/animals/lizard.png',    'icon' => '🦎'],
                ['category' => 'Animals', 'word_en' => 'Turtle',    'image_path' => 'images/animals/turtle.png',    'icon' => '🐢'],
                ['category' => 'Animals', 'word_en' => 'Camel',     'image_path' => 'images/animals/camel.png',     'icon' => '🐫'],
                ['category' => 'Animals', 'word_en' => 'Giraffe',   'image_path' => 'images/animals/giraffe.png',   'icon' => '🦒'],
                ['category' => 'Animals', 'word_en' => 'Koala',     'image_path' => 'images/animals/koala.png',     'icon' => '🐨'],
                ['category' => 'Animals', 'word_en' => 'Panda',     'image_path' => 'images/animals/panda.png',     'icon' => '🐼'],
                ['category' => 'Animals', 'word_en' => 'Sloth',     'image_path' => 'images/animals/sloth.png',     'icon' => '🦥'],
                ['category' => 'Animals', 'word_en' => 'Armadillo',  'image_path' => 'images/animals/armadillo.png',  'icon' => '🦔'], // Using hedgehog emoji for armadillo
                ['category' => 'Animals', 'word_en' => 'Antelope',  'image_path' => 'images/animals/antelope.png',  'icon' => '🦌'], // Using deer emoji for antelope
                ['category' => 'Animals', 'word_en' => 'Bison',     'image_path' => 'images/animals/bison.png',     'icon' => '🐂'], // Using ox emoji for bison
                ['category' => 'Animals', 'word_en' => 'Buffalo',   'image_path' => 'images/animals/buffalo.png',   'icon' => '🐃'], // Using water buffalo emoji for buffalo
                ['category' => 'Animals', 'word_en' => 'Cheetah',   'image_path' => 'images/animals/cheetah.png',   'icon' => '🐆'], // Using leopard emoji for cheetah
                ['category' => 'Animals', 'word_en' => 'Hyena',     'image_path' => 'images/animals/hyena.png',     'icon' => '🦝'], // Using raccoon emoji for hyena
                ['category' => 'Animals', 'word_en' => 'Kangaroo',  'image_path' => 'images/animals/kangaroo.png',  'icon' => '🦘'],
                ['category' => 'Animals', 'word_en' => 'Llama',     'image_path' => 'images/animals/llama.png',     'icon' => '🦙'],
                ['category' => 'Animals', 'word_en' => 'Penguin',   'image_path' => 'images/animals/penguin.png',   'icon' => '🐧'],
                ['category' => 'Animals', 'word_en' => 'Porcupine',  'image_path' => 'images/animals/porcupine.png',  'icon' => '🦔'], // Using hedgehog emoji for porcupine
                ['category' => 'Animals', 'word_en' => 'Squirrel',  'image_path' => 'images/animals/squirrel.png',  'icon' => '🐿️'],
                ['category' => 'Animals', 'word_en' => 'Walrus',    'image_path' => 'images/animals/walrus.png',    'icon' => '🦭'],
                ['category' => 'Animals', 'word_en' => "Sea Lion",  "image_path" => "images/animals/sea_lion.png",  "icon" => "🦭"], // Using walrus emoji for sea lion
                ['category' => "Animals", "word_en" => "Ant",       "image_path" => "images/animals/ant.png",       "icon" => "🐜"],
                ['category' => "Animals", "word_en" => "Beetle",    "image_path" => "images/animals/beetle.png",    "icon" => "🐞"],

                // Food
                ['category' => 'Food', 'word_en' => 'Apple',     'image_path' => 'images/food/apple.png',    'icon' => '🍎'],
                ['category' => 'Food', 'word_en' => 'Bread',     'image_path' => 'images/food/bread.png',    'icon' => '🍞'],
                ['category' => 'Food', 'word_en' => 'Water',     'image_path' => 'images/food/water.png',    'icon' => '💧'],
                ['category' => 'Food', 'word_en' => 'Milk',      'image_path' => 'images/food/milk.png',     'icon' => '🥛'],
                ['category' => 'Food', 'word_en' => 'Rice',      'image_path' => 'images/food/rice.png',     'icon' => '🍚'],
                ['category' => 'Food', 'word_en' => 'Chicken',   'image_path' => 'images/food/chicken.png',  'icon' => '🍗'],
                ['category' => 'Food', 'word_en' => 'Pasta',     'image_path' => 'images/food/pasta.png',    'icon' => '🍝'],
                ['category' => 'Food', 'word_en' => 'Cheese',    'image_path' => 'images/food/cheese.png',   'icon' => '🧀'],
                ['category' => 'Food', 'word_en' => 'Egg',       'image_path' => 'images/food/egg.png',      'icon' => '🥚'],
                ['category' => 'Food', 'word_en' => 'Fruit',     'image_path' => 'images/food/fruit.png',    'icon' => '🍇'],
                ['category' => 'Food', 'word_en' => 'Vegetable', 'image_path' => 'images/food/vegetable.png','icon' => '🥕'],
                ['category' => 'Food', 'word_en' => 'Meat',      'image_path' => 'images/food/meat.png',     'icon' => '🥩'],
                ['category' => 'Food', 'word_en' => 'Soup',      'image_path' => 'images/food/soup.png',     'icon' => '🍲'],
                ['category' => 'Food', 'word_en' => 'Salad',     'image_path' => 'images/food/salad.png',    'icon' => '🥗'],
                ['category' => 'Food', 'word_en' => 'Pizza',     'image_path' => 'images/food/pizza.png',    'icon' => '🍕'],
                ['category' => 'Food', 'word_en' => 'Burger',    'image_path' => 'images/food/burger.png',   'icon' => '🍔'],
                ['category' => 'Food', 'word_en' => 'Fries',     'image_path' => 'images/food/fries.png',    'icon' => '🍟'],
                ['category' => 'Food', 'word_en' => 'Cake',      'image_path' => 'images/food/cake.png',     'icon' => '🍰'],
                ['category' => 'Food', 'word_en' => 'Coffee',    'image_path' => 'images/food/coffee.png',   'icon' => '☕'],
                ['category' => 'Food', 'word_en' => 'Tea',       'image_path' => 'images/food/tea.png',      'icon' => '🍵'],
                ['category' => 'Food', 'word_en' => 'Juice',     'image_path' => 'images/food/juice.png',    'icon' => '🧃'],
                ['category' => 'Food', 'word_en' => 'Sugar',     'image_path' => 'images/food/sugar.png',    'icon' => '🍬'],
                ['category' => 'Food', 'word_en' => 'Salt',      'image_path' => 'images/food/salt.png',     'icon' => '🧂'],
                ['category' => 'Food', 'word_en' => 'Butter',    'image_path' => 'images/food/butter.png',   'icon' => '🧈'],
                ['category' => 'Food', 'word_en' => 'Oil',       'image_path' => 'images/food/oil.png',      'icon' => '🛢️'], // no perfect oil emoji, used barrel
                ['category' => 'Food', 'word_en' => 'Vinegar',   'image_path' => 'images/food/vinegar.png',  'icon' => '🍶'],


                // Sports
                ['category' => 'Sports', 'word_en' => 'Football',   'image_path' => 'images/sports/football.png',   'icon' => '🏈'],
                ['category' => 'Sports', 'word_en' => 'Basketball', 'image_path' => 'images/sports/basketball.png', 'icon' => '🏀'],
                ['category' => 'Sports', 'word_en' => 'Tennis',     'image_path' => 'images/sports/tennis.png',     'icon' => '🎾'],
                ['category' => 'Sports', 'word_en' => 'Swimming',   'image_path' => 'images/sports/swimming.png',   'icon' => '🏊'],
                ['category' => 'Sports', 'word_en' => 'Running',    'image_path' => 'images/sports/running.png',    'icon' => '🏃'],
                ['category' => 'Sports', 'word_en' => 'Gym',        'image_path' => 'images/sports/gym.png',        'icon' => '🏋️'],
                ['category' => 'Sports', 'word_en' => 'Cycling',    'image_path' => 'images/sports/cycling.png',    'icon' => '🚴'],
                ['category' => 'Sports', 'word_en' => 'Golf',       'image_path' => 'images/sports/golf.png',       'icon' => '⛳'],
                ['category' => 'Sports', 'word_en' => 'Yoga',       'image_path' => 'images/sports/yoga.png',       'icon' => '🧘'],
                ['category' => 'Sports', 'word_en' => 'Baseball',   'image_path' => 'images/sports/baseball.png',   'icon' => '⚾'],
                ['category' => 'Sports', 'word_en' => 'Volleyball', 'image_path' => 'images/sports/volleyball.png', 'icon' => '🏐'],
                ['category' => 'Sports', 'word_en' => 'Skiing',     'image_path' => 'images/sports/skiing.png',     'icon' => '🎿'],
                ['category' => 'Sports', 'word_en' => 'Boxing',     'image_path' => 'images/sports/boxing.png',     'icon' => '🥊'],
                ['category' => 'Sports', 'word_en' => 'Karate',     'image_path' => 'images/sports/karate.png',     'icon' => '🥋'],
                ['category' => 'Sports', 'word_en' => 'Judo',       'image_path' => 'images/sports/judo.png',       'icon' => '🥋'],
                ['category' => 'Sports', 'word_en' => 'Skating',    'image_path' => 'images/sports/skating.png',    'icon' => '⛸️'],
                ['category' => 'Sports', 'word_en' => 'Surfing',    'image_path' => 'images/sports/surfing.png',    'icon' => '🏄'],
                ['category' => 'Sports', 'word_en' => 'Hiking',     'image_path' => 'images/sports/hiking.png',     'icon' => '🥾'],
                ['category' => 'Sports', 'word_en' => 'Climbing',   'image_path' => 'images/sports/climbing.png',   'icon' => '🧗'],
                ['category' => 'Sports', 'word_en' => 'Fishing',    'image_path' => 'images/sports/fishing.png',    'icon' => '🎣'],
                ['category' => 'Sports', 'word_en' => 'Archery',    'image_path' => 'images/sports/archery.png',    'icon' => '🏹'],
                ['category' => 'Sports', 'word_en' => 'Rugby',      'image_path' => 'images/sports/rugby.png',      'icon' => '🏉'],
                ['category' => 'Sports', 'word_en' => 'Cricket',    'image_path' => 'images/sports/cricket.png',    'icon' => '🏏'],
                ['category' => 'Sports', 'word_en' => 'Badminton',  'image_path' => 'images/sports/badminton.png',  'icon' => '🏸'],
                ['category' => 'Sports', 'word_en' => 'Table Tennis','image_path' => 'images/sports/table_tennis.png','icon' => '🏓'],

                // People
                ['category' => 'People', 'word_en' => 'Man',          'image_path' => 'images/people/man.png',          'icon' => '👨🏿'],
                ['category' => 'People', 'word_en' => 'Woman',        'image_path' => 'images/people/woman.png',        'icon' => '👩🏿'],
                ['category' => 'People', 'word_en' => 'Child',        'image_path' => 'images/people/child.png',        'icon' => '🧒🏿'],
                ['category' => 'People', 'word_en' => 'Teacher',      'image_path' => 'images/people/teacher.png',      'icon' => '👩🏿‍🏫'],
                ['category' => 'People', 'word_en' => 'Doctor',       'image_path' => 'images/people/doctor.png',       'icon' => '👨🏿‍⚕️'],
                ['category' => 'People', 'word_en' => 'Friend',       'image_path' => 'images/people/friend.png',       'icon' => '🤝'], // no skin tone variation
                ['category' => 'People', 'word_en' => 'Student',      'image_path' => 'images/people/student.png',      'icon' => '🎓'], // no person emoji, cap only
                ['category' => 'People', 'word_en' => 'Family',       'image_path' => 'images/people/family.png',       'icon' => '👪'], // no skin tone variations
                ['category' => 'People', 'word_en' => 'Parent',       'image_path' => 'images/people/parent.png',       'icon' => '🧑🏿‍🤝‍🧑🏿'],
                ['category' => 'People', 'word_en' => 'Brother',      'image_path' => 'images/people/brother.png',      'icon' => '👦🏿'],
                ['category' => 'People', 'word_en' => 'Sister',       'image_path' => 'images/people/sister.png',       'icon' => '👧🏿'],
                ['category' => 'People', 'word_en' => 'Grandparent',  'image_path' => 'images/people/grandparent.png',  'icon' => '🧓🏿'],
                ['category' => 'People', 'word_en' => 'Baby',         'image_path' => 'images/people/baby.png',         'icon' => '👶🏿'],
                ['category' => 'People', 'word_en' => 'Boy',          'image_path' => 'images/people/boy.png',          'icon' => '👦🏿'],
                ['category' => 'People', 'word_en' => 'Girl',         'image_path' => 'images/people/girl.png',         'icon' => '👧🏿'],
                ['category' => 'People', 'word_en' => 'King',         'image_path' => 'images/people/king.png',         'icon' => '🤴🏿'],
                ['category' => 'People', 'word_en' => 'Queen',        'image_path' => 'images/people/queen.png',        'icon' => '👸🏿'],
                ['category' => 'People', 'word_en' => 'Soldier',      'image_path' => 'images/people/soldier.png',      'icon' => '🪖'], // helmet emoji only, not person-based
                ['category' => 'People', 'word_en' => 'Artist',       'image_path' => 'images/people/artist.png',       'icon' => '🧑🏿‍🎨'],
                ['category' => 'People', 'word_en' => 'Musician',     'image_path' => 'images/people/musician.png',     'icon' => '🧑🏿‍🎤'],

                // Household Items
                ['category' => 'Household Items', 'word_en' => 'Chair',       'image_path' => 'images/household_items/chair.png',       'icon' => '🪑'],
                ['category' => 'Household Items', 'word_en' => 'Table',       'image_path' => 'images/household_items/table.png',       'icon' => '🛋️'],  // No table emoji, sofa used as closest
                ['category' => 'Household Items', 'word_en' => 'Bed',         'image_path' => 'images/household_items/bed.png',         'icon' => '🛏️'],
                ['category' => 'Household Items', 'word_en' => 'Door',        'image_path' => 'images/household_items/door.png',        'icon' => '🚪'],
                ['category' => 'Household Items', 'word_en' => 'Window',      'image_path' => 'images/household_items/window.png',      'icon' => '🪟'],
                ['category' => 'Household Items', 'word_en' => 'Lamp',        'image_path' => 'images/household_items/lamp.png',        'icon' => '💡'],
                ['category' => 'Household Items', 'word_en' => 'Sofa',        'image_path' => 'images/household_items/sofa.png',        'icon' => '🛋️'],
                ['category' => 'Household Items', 'word_en' => 'Television',  'image_path' => 'images/household_items/television.png',  'icon' => '📺'],
                ['category' => 'Household Items', 'word_en' => 'Cup',         'image_path' => 'images/household_items/cup.png',         'icon' => '☕'],
                ['category' => 'Household Items', 'word_en' => 'Plate',       'image_path' => 'images/household_items/plate.png',       'icon' => '🍽️'],
                ['category' => 'Household Items', 'word_en' => 'Fork',        'image_path' => 'images/household_items/fork.png',        'icon' => '🍴'],
                ['category' => 'Household Items', 'word_en' => 'Spoon',       'image_path' => 'images/household_items/spoon.png',       'icon' => '🥄'],
                ['category' => 'Household Items', 'word_en' => 'Knife',       'image_path' => 'images/household_items/knife.png',       'icon' => '🔪'],
                ['category' => 'Household Items', 'word_en' => 'Cabinet',     'image_path' => 'images/household_items/cabinet.png',     'icon' => '🗄️'],
                ['category' => 'Household Items', 'word_en' => 'Mirror',      'image_path' => 'images/household_items/mirror.png',      'icon' => '🪞'],
                ['category' => 'Household Items', 'word_en' => 'Rug',         'image_path' => 'images/household_items/rug.png',         'icon' => '🧶'],  // Yarn used as rug substitute
                ['category' => 'Household Items', 'word_en' => 'Curtain',     'image_path' => 'images/household_items/curtain.png',     'icon' => '🚪'],  // No curtain emoji, door reused
                ['category' => 'Household Items', 'word_en' => 'Clock',       'image_path' => 'images/household_items/clock.png',       'icon' => '🕰️'],
                ['category' => 'Household Items', 'word_en' => 'Vase',        'image_path' => 'images/household_items/vase.png',        'icon' => '🏺'],
                ['category' => 'Household Items', 'word_en' => 'Pillow',      'image_path' => 'images/household_items/pillow.png',      'icon' => '🛏️'],  // Bed emoji reused as pillow
                ['category' => 'Household Items', 'word_en' => 'Blanket',     'image_path' => 'images/household_items/blanket.png',     'icon' => '🛏️'],  // Same as pillow
                ['category' => 'Household Items', 'word_en' => 'Desk',        'image_path' => 'images/household_items/desk.png',        'icon' => '🪑'],  // Chair reused as desk substitute
                ['category' => 'Household Items', 'word_en' => 'Shelf',       'image_path' => 'images/household_items/shelf.png',       'icon' => '🗄️'],  // Cabinet reused
                ['category' => 'Household Items', 'word_en' => 'Telephone',   'image_path' => 'images/household_items/telephone.png',   'icon' => '☎️'],
                ['category' => 'Household Items', 'word_en' => 'Computer',    'image_path' => 'images/household_items/computer.png',    'icon' => '💻'],
                ['category' => 'Household Items', 'word_en' => 'Washing Machine', 'image_path' => 'images/household_items/washing_machine.png', 'icon' => '🧺'], // Basket used as washing machine substitute
                ['category' => 'Household Items', 'word_en' => 'Fridge',      'image_path' => 'images/household_items/fridge.png',      'icon' => '🧊'], // Ice cube used as fridge substitute
                ['category' => 'Household Items', 'word_en' => 'Oven',        'image_path' => 'images/household_items/oven.png',        'icon' => '🔥'], // Fire used as oven substitute
                ['category' => 'Household Items', 'word_en' => 'Toaster',     'image_path' => 'images/household_items/toaster.png',     'icon' => '🍞'], // Bread used as toaster substitute
                ['category' => 'Household Items', 'word_en' => 'Blender',     'image_path' => 'images/household_items/blender.png',     'icon' => '🥤'], // Cup used as blender substitute
                ['category' => 'Household Items', 'word_en' => 'Microwave',   'image_path' => 'images/household_items/microwave.png',   'icon' => '🍲'], // Soup used as microwave substitute
                ['category' => 'Household Items', 'word_en' => 'Iron',        'image_path' => 'images/household_items/iron.png',        'icon' => '🧺'], // Basket used as iron substitute
                ['category' => 'Household Items', 'word_en' => 'Vacuum Cleaner', 'image_path' => 'images/household_items/vacuum_cleaner.png', 'icon' => '🧹'], // Broom used as vacuum cleaner substitute

                // Nature
                ['category' => 'Nature', 'word_en' => 'Tree',       'image_path' => 'images/nature/tree.png',       'icon' => '🌳'],
                ['category' => 'Nature', 'word_en' => 'Flower',     'image_path' => 'images/nature/flower.png',     'icon' => '🌸'],
                ['category' => 'Nature', 'word_en' => 'River',      'image_path' => 'images/nature/river.png',      'icon' => '🏞️'],
                ['category' => 'Nature', 'word_en' => 'Mountain',   'image_path' => 'images/nature/mountain.png',   'icon' => '⛰️'],
                ['category' => 'Nature', 'word_en' => 'Rain',       'image_path' => 'images/nature/rain.png',       'icon' => '🌧️'],
                ['category' => 'Nature', 'word_en' => 'Snow',       'image_path' => 'images/nature/snow.png',       'icon' => '❄️'],
                ['category' => 'Nature', 'word_en' => 'Sun',        'image_path' => 'images/nature/sun.png',        'icon' => '☀️'],
                ['category' => 'Nature', 'word_en' => 'Moon',       'image_path' => 'images/nature/moon.png',       'icon' => '🌙'],
                ['category' => 'Nature', 'word_en' => 'Star',       'image_path' => 'images/nature/star.png',       'icon' => '⭐'],
                ['category' => 'Nature', 'word_en' => 'Wind',       'image_path' => 'images/nature/wind.png',       'icon' => '🌬️'],
                ['category' => 'Nature', 'word_en' => 'Cloud',      'image_path' => 'images/nature/cloud.png',      'icon' => '☁️'],
                ['category' => 'Nature', 'word_en' => 'Lake',       'image_path' => 'images/nature/lake.png',       'icon' => '🏞️'],   // Same as river/landscape
                ['category' => 'Nature', 'word_en' => 'Ocean',      'image_path' => 'images/nature/ocean.png',      'icon' => '🌊'],
                ['category' => 'Nature', 'word_en' => 'Beach',      'image_path' => 'images/nature/beach.png',      'icon' => '🏖️'],
                ['category' => 'Nature', 'word_en' => 'Forest',     'image_path' => 'images/nature/forest.png',     'icon' => '🌲'],
                ['category' => 'Nature', 'word_en' => 'Desert',     'image_path' => 'images/nature/desert.png',     'icon' => '🏜️'],
                ['category' => 'Nature', 'word_en' => 'Valley',     'image_path' => 'images/nature/valley.png',     'icon' => '🏞️'],   // Valley shares landscape emoji
                ['category' => 'Nature', 'word_en' => 'Island',     'image_path' => 'images/nature/island.png',     'icon' => '🏝️'],
                ['category' => 'Nature', 'word_en' => 'Volcano',    'image_path' => 'images/nature/volcano.png',    'icon' => '🌋'],
                ['category' => 'Nature', 'word_en' => 'Waterfall',  'image_path' => 'images/nature/waterfall.png',  'icon' => '🏞️'],  // No waterfall emoji, reused landscape
                ['category' => 'Nature', 'word_en' => 'Tree',       'image_path' => 'images/nature/tree.png',       'icon' => '🌳'],
                ['category' => 'Nature', 'word_en' => 'Grass',      'image_path' => 'images/nature/grass.png',      'icon' => '🌱'],
                ['category' => 'Nature', 'word_en' => 'Rock',       'image_path' => 'images/nature/rock.png',       'icon' => '🪨'],
                ['category' => 'Nature', 'word_en' => 'Soil',       'image_path' => 'images/nature/soil.png',       'icon' => '🌍'],  // Earth emoji used for soil
                ['category' => 'Nature', 'word_en' => 'Cave',       'image_path' => 'images/nature/cave.png',       'icon' => '🕳️'],  // Hole emoji used for cave
                ['category' => 'Nature', 'word_en' => 'Field',      'image_path' => 'images/nature/field.png',      'icon' => '🌾'],  // Sheaf of rice used for field
                ['category' => 'Nature', 'word_en' => 'Swamp',      'image_path' => 'images/nature/swamp.png',      'icon' => '🪸'],  // Coral used as swamp substitute
                ['category' => 'Nature', 'word_en' => 'Pond',       'image_path' => 'images/nature/pond.png',       'icon' => '🏞️'],  // Landscape reused for pond

                // Colors 
                ['category' => 'Colors', 'word_en' => 'Red',       'color_code' => '#FF0000'],
                ['category' => 'Colors', 'word_en' => 'Blue',      'color_code' => '#0000FF'],
                ['category' => 'Colors', 'word_en' => 'Green',     'color_code' => '#008000'],
                ['category' => 'Colors', 'word_en' => 'Yellow',    'color_code' => '#FFFF00'],
                ['category' => 'Colors', 'word_en' => 'Black',     'color_code' => '#000000'],
                ['category' => 'Colors', 'word_en' => 'White',     'color_code' => '#FFFFFF'],
                ['category' => 'Colors', 'word_en' => 'Purple',    'color_code' => '#800080'],
                ['category' => 'Colors', 'word_en' => 'Orange',    'color_code' => '#FFA500'],
                ['category' => 'Colors', 'word_en' => 'Pink',      'color_code' => '#FFC0CB'],
                ['category' => 'Colors', 'word_en' => 'Brown',     'color_code' => '#A52A2A'],
                ['category' => 'Colors', 'word_en' => 'Gray',      'color_code' => '#808080'],
                ['category' => 'Colors', 'word_en' => 'Gold',      'color_code' => '#FFD700'],
                ['category' => 'Colors', 'word_en' => 'Silver',    'color_code' => '#C0C0C0'], 
                ['category' => 'Colors', 'word_en' => 'Cyan',      'color_code' => '#00FFFF'],
                ['category' => 'Colors', 'word_en' => 'Magenta',   'color_code' => '#FF00FF'],
                ['category' => 'Colors', 'word_en' => 'Maroon',    'color_code' => '#800000'],
                ['category' => 'Colors', 'word_en' => 'Olive',     'color_code' => '#808000'],
                ['category' => 'Colors', 'word_en' => 'Navy',      'color_code' => '#000080'],
                ['category' => 'Colors', 'word_en' => 'Teal',      'color_code' => '#008080'],
                ['category' => 'Colors', 'word_en' => 'Lime',      'color_code' => '#00FF00'],
                ['category' => 'Colors', 'word_en' => 'Coral',     'color_code' => '#FF7F50'],
                ['category' => 'Colors', 'word_en' => 'Indigo',    'color_code' => '#4B0082'],
                ['category' => 'Colors', 'word_en' => 'Beige',     'color_code' => '#F5F5DC'],
                ['category' => 'Colors', 'word_en' => 'Turquoise', 'color_code' => '#40E0D0'],
                ['category' => 'Colors', 'word_en' => 'Mint',      'color_code' => '#98FF98'],
                ['category' => 'Colors', 'word_en' => 'Lavender',  'color_code' => '#E6E6FA'],
                ['category' => 'Colors', 'word_en' => 'Peach',     'color_code' => '#FFE5B4'],
                ['category' => 'Colors', 'word_en' => 'Crimson',   'color_code' => '#DC143C'],
                ['category' => 'Colors', 'word_en' => 'Ivory',     'color_code' => '#FFFFF0'],
                ['category' => 'Colors', 'word_en' => 'Charcoal',  'color_code' => '#36454F'],
                ['category' => 'Colors', 'word_en' => 'Azure',     'color_code' => '#007FFF'],
                ['category' => 'Colors', 'word_en' => 'Tan',       'color_code' => '#D2B48C'],
                ['category' => 'Colors', 'word_en' => 'Rose',      'color_code' => '#FF007F'],
                ['category' => 'Colors', 'word_en' => 'Khaki',     'color_code' => '#F0E68C'],
                ['category' => 'Colors', 'word_en' => 'Sky Blue',  'color_code' => '#87CEEB'],

                // Body Parts
                ['category' => 'Body Parts', 'word_en' => 'Head',     'image_path' => 'images/body_parts/head.png',     'icon' => '🧑🏿‍🦲'],
                ['category' => 'Body Parts', 'word_en' => 'Eye',      'image_path' => 'images/body_parts/eye.png',      'icon' => '👁️'],
                ['category' => 'Body Parts', 'word_en' => 'Ear',      'image_path' => 'images/body_parts/ear.png',      'icon' => '👂🏿'],
                ['category' => 'Body Parts', 'word_en' => 'Nose',     'image_path' => 'images/body_parts/nose.png',     'icon' => '👃🏿'],
                ['category' => 'Body Parts', 'word_en' => 'Mouth',    'image_path' => 'images/body_parts/mouth.png',    'icon' => '👄'],
                ['category' => 'Body Parts', 'word_en' => 'Hand',     'image_path' => 'images/body_parts/hand.png',     'icon' => '✋🏿'],
                ['category' => 'Body Parts', 'word_en' => 'Foot',     'image_path' => 'images/body_parts/foot.png',     'icon' => '🦶🏿'],
                ['category' => 'Body Parts', 'word_en' => 'Leg',      'image_path' => 'images/body_parts/leg.png',      'icon' => '🦵🏿'],
                ['category' => 'Body Parts', 'word_en' => 'Arm',      'image_path' => 'images/body_parts/arm.png',      'icon' => '💪🏿'],
                ['category' => 'Body Parts', 'word_en' => 'Finger',   'image_path' => 'images/body_parts/finger.png',   'icon' => '☝🏿'],
                ['category' => 'Body Parts', 'word_en' => 'Hair',     'image_path' => 'images/body_parts/hair.png',     'icon' => '💇🏿‍♂️'],
                ['category' => 'Body Parts', 'word_en' => 'Heart',    'image_path' => 'images/body_parts/heart.png',    'icon' => '❤️'],
                ['category' => 'Body Parts', 'word_en' => 'Brain',    'image_path' => 'images/body_parts/brain.png',    'icon' => '🧠'],
                ['category' => 'Body Parts', 'word_en' => 'Back',     'image_path' => 'images/body_parts/back.png',     'icon' => '🦴'],
                ['category' => 'Body Parts', 'word_en' => 'Stomach',  'image_path' => 'images/body_parts/stomach.png',  'icon' => '🍽️'],
                ['category' => 'Body Parts', 'word_en' => 'Knee',     'image_path' => 'images/body_parts/knee.png',     'icon' => '🦵🏿'],
                ['category' => 'Body Parts', 'word_en' => 'Elbow',    'image_path' => 'images/body_parts/elbow.png',    'icon' => '🦾'],
                ['category' => 'Body Parts', 'word_en' => 'Shoulder', 'image_path' => 'images/body_parts/shoulder.png', 'icon' => '🦾'],
                ['category' => 'Body Parts', 'word_en' => 'Wrist',    'image_path' => 'images/body_parts/wrist.png',    'icon' => '⌚'],
                ['category' => 'Body Parts', 'word_en' => 'Ankle',    'image_path' => 'images/body_parts/ankle.png',    'icon' => '👟'],
                ['category' => 'Body Parts', 'word_en' => 'Toe',      'image_path' => 'images/body_parts/toe.png',      'icon' => '🦶🏿'],
                ['category' => 'Body Parts', 'word_en' => 'Skin',     'image_path' => 'images/body_parts/skin.png',     'icon' => '🧑🏿‍🦲'],
                ['category' => 'Body Parts', 'word_en' => 'Nail',     'image_path' => 'images/body_parts/nail.png',     'icon' => '💅🏿'],

                // Vehicles
                ['category' => 'Vehicles', 'word_en' => 'Car',          'image_path' => 'images/vehicles/car.png',          'icon' => '🚗'],
                ['category' => 'Vehicles', 'word_en' => 'Bus',          'image_path' => 'images/vehicles/bus.png',          'icon' => '🚌'],
                ['category' => 'Vehicles', 'word_en' => 'Bicycle',      'image_path' => 'images/vehicles/bicycle.png',      'icon' => '🚲'],
                ['category' => 'Vehicles', 'word_en' => 'Motorcycle',   'image_path' => 'images/vehicles/motorcycle.png',   'icon' => '🏍️'],
                ['category' => 'Vehicles', 'word_en' => 'Truck',        'image_path' => 'images/vehicles/truck.png',        'icon' => '🚚'],
                ['category' => 'Vehicles', 'word_en' => 'Train',        'image_path' => 'images/vehicles/train.png',        'icon' => '🚆'],
                ['category' => 'Vehicles', 'word_en' => 'Airplane',     'image_path' => 'images/vehicles/airplane.png',     'icon' => '✈️'],
                ['category' => 'Vehicles', 'word_en' => 'Boat',         'image_path' => 'images/vehicles/boat.png',         'icon' => '⛵'],
                ['category' => 'Vehicles', 'word_en' => 'Ship',         'image_path' => 'images/vehicles/ship.png',         'icon' => '🚢'],
                ['category' => 'Vehicles', 'word_en' => 'Helicopter',   'image_path' => 'images/vehicles/helicopter.png',   'icon' => '🚁'],
                ['category' => 'Vehicles', 'word_en' => 'Submarine',    'image_path' => 'images/vehicles/submarine.png',    'icon' => '🚤'],
                ['category' => 'Vehicles', 'word_en' => 'Tractor',      'image_path' => 'images/vehicles/tractor.png',      'icon' => '🚜'],
                ['category' => 'Vehicles', 'word_en' => 'Scooter',     'image_path' => 'images/vehicles/scooter.png',     'icon' => '🛵'],
                ['category' => 'Vehicles', 'word_en' => 'Van',         'image_path' => 'images/vehicles/van.png',         'icon' => '🚐'],
                ['category' => 'Vehicles', 'word_en' => 'Taxi',        'image_path' => 'images/vehicles/taxi.png',        'icon' => '🚕'],
                ['category' => 'Vehicles', 'word_en' => 'Fire Truck',  'image_path' => 'images/vehicles/fire_truck.png',  'icon' => '🚒'],
                ['category' => 'Vehicles', 'word_en' => 'Police Car',  'image_path' => 'images/vehicles/police_car.png',  'icon' => '🚓'],
                ['category' => 'Vehicles', 'word_en' => 'Ambulance',   'image_path' => 'images/vehicles/ambulance.png',   'icon' => '🚑'],
                ['category' => 'Vehicles', 'word_en' => 'Construction Vehicle', 'image_path' => 'images/vehicles/construction_vehicle.png', 'icon' => '🚧'],
                ['category' => 'Vehicles', 'word_en' => 'Golf Cart',   'image_path' => 'images/vehicles/golf_cart.png',   'icon' => '⛳'],
                ['category' => 'Vehicles', 'word_en' => 'Cable Car',   'image_path' => 'images/vehicles/cable_car.png',   'icon' => '🚡'],
                ['category' => 'Vehicles', 'word_en' => 'Segway',      'image_path' => 'images/vehicles/segway.png',      'icon' => '🛴'],
                ['category' => 'Vehicles', 'word_en' => 'Skateboard',  'image_path' => 'images/vehicles/skateboard.png',  'icon' => '🛹'],
                ['category' => 'Vehicles', 'word_en' => 'Rollerblades', 'image_path' => 'images/vehicles/rollerblades.png', 'icon' => '🛼'],
                ['category' => 'Vehicles', 'word_en' => 'Hot Air Balloon', 'image_path' => 'images/vehicles/hot_air_balloon.png', 'icon' => '🎈'],

                // School
                ['category' => 'School', 'word_en' => 'Book',         'image_path' => 'images/school/book.png',         'icon' => '📚'],
                ['category' => 'School', 'word_en' => 'Pencil',       'image_path' => 'images/school/pencil.png',       'icon' => '✏️'],
                ['category' => 'School', 'word_en' => 'Notebook',     'image_path' => 'images/school/notebook.png',     'icon' => '📓'],
                ['category' => 'School', 'word_en' => 'Blackboard',   'image_path' => 'images/school/blackboard.png',   'icon' => '🖊️'],
                ['category' => 'School', 'word_en' => 'Chalk',        'image_path' => 'images/school/chalk.png',        'icon' => '🖍️'],
                ['category' => 'School', 'word_en' => 'Eraser',       'image_path' => 'images/school/eraser.png',       'icon' => '🧽'],
                ['category' => 'School', 'word_en' => 'Ruler',        'image_path' => 'images/school/ruler.png',        'icon' => '📏'],
                ['category' => 'School', 'word_en' => 'Glue',         'image_path' => 'images/school/glue.png',         'icon' => '🖇️'],
                ['category' => 'School', 'word_en' => 'Scissors',     'image_path' => 'images/school/scissors.png',     'icon' => '✂️'],
                ['category' => 'School', 'word_en' => "Teacher's Desk", 	'image_path'=>	"images/school/teachers_desk.png",		'icon'=>'🪑'], // Chair used as desk substitute
                ['category' => "School", 	"word_en"	=> "Student's Desk", 	'image_path'=>	"images/school/students_desk.png",		"icon"=> "🪑"], // Chair used as desk substitute
                ['category'=> "School", 	"word_en"=> "Classroom", 	'image_path'=> "images/school/classroom.png", 	"icon"=> "🏫"], // School emoji used as classroom substitute
                ['category' => 'School', 'word_en' => 'Globe',        'image_path' => 'images/school/globe.png',        'icon' => '🌍'],
                ['category' => 'School', 'word_en' => 'Calculator',   'image_path' => 'images/school/calculator.png',   'icon' => '🧮'],
                ['category' => 'School', 'word_en' => 'Computer',     'image_path' => 'images/school/computer.png',     'icon' => '💻'],
                ['category' => 'School', 'word_en' => 'Projector',    'image_path' => 'images/school/projector.png',    'icon' => '📽️'],
                ['category' => 'School', 'word_en' => 'Whiteboard',   'image_path' => 'images/school/whiteboard.png',   'icon' => '🖊️'], // Pen used as whiteboard substitute
                ['category' => 'School', 'word_en' => "Lunchbox",     'image_path' => "images/school/lunchbox.png",     "icon" => "🍱"],
                ['category' => "School", 	"word_en"	=> "Backpack", 	'image_path'=>	"images/school/backpack.png",		"icon"=> "🎒"],

                // Technology
                ['category' => 'Technology', 'word_en' => 'Computer',   'image_path' => 'images/technology/computer.png',   'icon' => '💻'],
                ['category' => 'Technology', 'word_en' => 'Phone',      'image_path' => 'images/technology/phone.png',      'icon' => '📱'],
                ['category' => 'Technology', 'word_en' => 'Internet',   'image_path' => 'images/technology/internet.png',   'icon' => '🌐'],
                ['category' => 'Technology', 'word_en' => 'Software',   'image_path' => 'images/technology/software.png',   'icon' => '🧑‍💻'],
                ['category' => 'Technology', 'word_en' => 'Hardware',   'image_path' => 'images/technology/hardware.png',   'icon' => '🖥️'],
                ['category' => 'Technology', 'word_en' => 'Camera',     'image_path' => 'images/technology/camera.png',     'icon' => '📷'],
                ['category' => 'Technology', 'word_en' => 'Television', 'image_path' => 'images/technology/television.png', 'icon' => '📺'],
                ['category' => 'Technology', 'word_en' => 'Radio',      'image_path' => 'images/technology/radio.png',      'icon' => '📻'],
                ['category' => 'Technology', 'word_en' => 'Speaker',    'image_path' => 'images/technology/speaker.png',    'icon' => '🔊'],
                ['category' => 'Technology', 'word_en' => 'Headphones', 'image_path' => 'images/technology/headphones.png', 'icon' => '🎧'],
                ['category' => 'Technology', 'word_en' => 'Printer',    'image_path' => 'images/technology/printer.png',    'icon' => '🖨️'],
                ['category' => 'Technology', 'word_en' => 'Keyboard',   'image_path' => 'images/technology/keyboard.png',   'icon' => '⌨️'],
                ['category' => 'Technology', 'word_en' => 'Mouse',      'image_path' => 'images/technology/mouse.png',      'icon' => '🖱️'],
                ['category' => 'Technology', 'word_en' => 'Monitor',    'image_path' => 'images/technology/monitor.png',    'icon' => '🖥️'],
                ['category' => 'Technology', 'word_en' => 'Tablet',     'image_path' => 'images/technology/tablet.png',     'icon' => '📱'],
                ['category' => 'Technology', 'word_en' => 'Smartwatch', 'image_path' => 'images/technology/smartwatch.png', 'icon' => '⌚'],
                ['category' => 'Technology', 'word_en' => 'Drone',      'image_path' => 'images/technology/drone.png',      'icon' => '🚁'],
                ['category' => 'Technology', 'word_en' => 'Virtual Reality', 'image_path' => 'images/technology/vr.png',  'icon' => '🕶️'],
                ['category' => 'Technology', 'word_en' => 'Artificial Intelligence', 'image_path' => 'images/technology/ai.png',  'icon' => '🤖'],
                ['category' => 'Technology', 'word_en' => 'Blockchain', 'image_path' => 'images/technology/blockchain.png', 'icon' => '🔗'],
                ['category' => 'Technology', 'word_en' => 'Cloud Computing', 'image_path' => 'images/technology/cloud.png', 'icon' => '☁️'],
                ['category' => 'Technology', 'word_en' => 'Cybersecurity', 'image_path' => 'images/technology/cybersecurity.png', 'icon' => '🛡️'],
                ['category' => 'Technology', 'word_en' => '3D Printing', 'image_path' => 'images/technology/3d_printing.png', 'icon' => '🖨️'],
                ['category' => 'Technology', 'word_en' => 'Smart Home',  'image_path' => 'images/technology/smart_home.png',  'icon' => '🏠'],
                ['category' => 'Technology', 'word_en' => 'Wearable Tech', 'image_path' => 'images/technology/wearable_tech.png', 'icon' => '⌚'],
                ['category' => 'Technology', 'word_en' => 'Gaming Console', 'image_path' => 'images/technology/gaming_console.png', 'icon' => '🎮'],
                ['category' => 'Technology', 'word_en' => 'Smartphone',  'image_path' => 'images/technology/smartphone.png',  'icon' => '📱'],
                ['category' => 'Technology', 'word_en' => 'Smart Speaker', 'image_path' => 'images/technology/smart_speaker.png', 'icon' => '🔊'],

                // Weather
                ['category' => 'Weather', 'word_en' => 'Sunny',  'image_path' => 'images/weather/sunny.png',  'icon' => '☀️'],
                ['category' => 'Weather', 'word_en' => 'Rainy',  'image_path' => 'images/weather/rainy.png',  'icon' => '🌧️'],
                ['category' => 'Weather', 'word_en' => 'Cloudy', 'image_path' => 'images/weather/cloudy.png', 'icon' => '☁️'],
                ['category' => 'Weather', 'word_en' => 'Stormy', 'image_path' => 'images/weather/stormy.png', 'icon' => '⛈️'],
                ['category' => 'Weather', 'word_en' => 'Windy',  'image_path' => 'images/weather/windy.png',  'icon' => '🌬️'],
                ['category' => 'Weather', 'word_en' => 'Snowy',  'image_path' => 'images/weather/snowy.png',  'icon' => '🌨️'],
                ['category' => 'Weather', 'word_en' => 'Foggy',  'image_path' => 'images/weather/foggy.png',  'icon' => '🌫️'],
                ['category' => 'Weather', 'word_en' => 'Hot',    'image_path' => 'images/weather/hot.png',    'icon' => '🔥'],
                ['category' => 'Weather', 'word_en' => 'Cold',   'image_path' => 'images/weather/cold.png',   'icon' => '🥶'],
                ['category' => 'Weather', 'word_en' => 'Humid',  'image_path' => 'images/weather/humid.png',  'icon' => '💧'],
                ['category' => 'Weather', 'word_en' => 'Thunder', 'image_path' => 'images/weather/thunder.png', 'icon' => '⚡'],
                ['category' => 'Weather', 'word_en' => 'Rainbow', 'image_path' => 'images/weather/rainbow.png', 'icon' => '🌈'],
                ['category' => 'Weather', 'word_en' => 'Hail',    'image_path' => 'images/weather/hail.png',    'icon' => '🌨️'],
                ['category' => 'Weather', 'word_en' => 'Drizzle', 'image_path' => 'images/weather/drizzle.png', 'icon' => '🌦️'],
                ['category' => 'Weather', 'word_en' => 'Blizzard', 'image_path' => 'images/weather/blizzard.png', 'icon' => '❄️'],
                ['category' => 'Weather', 'word_en' => 'Tornado',  'image_path' => 'images/weather/tornado.png',  'icon' => '🌪️'],
                ['category' => 'Weather', 'word_en' => 'Cyclone',  'image_path' => 'images/weather/cyclone.png',  'icon' => '🌀'],
                ['category' => 'Weather', 'word_en' => 'Heatwave', 'image_path' => 'images/weather/heatwave.png', 'icon' => '🌡️'],
                ['category' => 'Weather', 'word_en' => 'Dust Storm', 'image_path' => 'images/weather/dust_storm.png', 'icon' => '🌪️'],
                ['category' => 'Weather', 'word_en' => 'Frost',    'image_path' => 'images/weather/frost.png',    'icon' => '❄️'],
                ['category' => 'Weather', 'word_en' => 'Overcast', 'image_path' => 'images/weather/overcast.png', 'icon' => '☁️'],
                ['category' => 'Weather', 'word_en' => 'Lightning', 'image_path' => 'images/weather/lightning.png', 'icon' => '⚡'],

                // Emotions 
                ['category' => 'Emotions', 'word_en' => 'Happy',       'image_path' => 'images/emotions/happy.png',       'icon' => '😊'],  // no skin tone
                ['category' => 'Emotions', 'word_en' => 'Sad',         'image_path' => 'images/emotions/sad.png',         'icon' => '😢'],
                ['category' => 'Emotions', 'word_en' => 'Angry',       'image_path' => 'images/emotions/angry.png',       'icon' => '😠'],
                ['category' => 'Emotions', 'word_en' => 'Scared',      'image_path' => 'images/emotions/scared.png',      'icon' => '😨'],
                ['category' => 'Emotions', 'word_en' => 'Excited',     'image_path' => 'images/emotions/excited.png',     'icon' => '🤩'],
                ['category' => 'Emotions', 'word_en' => 'Tired',       'image_path' => 'images/emotions/tired.png',       'icon' => '😴'],
                ['category' => 'Emotions', 'word_en' => 'Bored',       'image_path' => 'images/emotions/bored.png',       'icon' => '🥱'],
                ['category' => 'Emotions', 'word_en' => 'Nervous',     'image_path' => 'images/emotions/nervous.png',     'icon' => '😬'],
                ['category' => 'Emotions', 'word_en' => 'Surprised',   'image_path' => 'images/emotions/surprised.png',   'icon' => '😮'],
                ['category' => 'Emotions', 'word_en' => 'Confused',    'image_path' => 'images/emotions/confused.png',    'icon' => '😕'],
                ['category' => 'Emotions', 'word_en' => 'Proud',       'image_path' => 'images/emotions/proud.png',       'icon' => '🙋🏿'], // person raising hand (representing pride)
                ['category' => 'Emotions', 'word_en' => 'Embarrassed', 'image_path' => 'images/emotions/embarrassed.png', 'icon' => '😳'],
                ['category' => 'Emotions', 'word_en' => 'Lonely',      'image_path' => 'images/emotions/lonely.png',      'icon' => '😔'],
                ['category' => 'Emotions', 'word_en' => 'Shy',         'image_path' => 'images/emotions/shy.png',         'icon' => '🙇🏿'], // person bowing (shy expression)
                ['category' => 'Emotions', 'word_en' => 'Calm',        'image_path' => 'images/emotions/calm.png',        'icon' => '😌'],
                ['category' => 'Emotions', 'word_en' => 'In Love',     'image_path' => 'images/emotions/in_love.png',     'icon' => '😍'],
                ['category' => 'Emotions', 'word_en' => 'Sick',        'image_path' => 'images/emotions/sick.png',        'icon' => '🤒'],
                ['category' => 'Emotions', 'word_en' => 'Crying',      'image_path' => 'images/emotions/crying.png',      'icon' => '😭'],
                ['category' => 'Emotions', 'word_en' => 'Laughing',    'image_path' => 'images/emotions/laughing.png',    'icon' => '😂'],
                ['category' => 'Emotions', 'word_en' => 'Blushing',    'image_path' => 'images/emotions/blushing.png',    'icon' => '😊'],
                ['category' => 'Emotions', 'word_en' => 'Hopeful',     'image_path' => 'images/emotions/hopeful.png',     'icon' => '🌈'],
                ['category' => 'Emotions', 'word_en' => 'Grateful',    'image_path' => 'images/emotions/grateful.png',    'icon' => '🙏'],
                ['category' => 'Emotions', 'word_en' => 'Jealous',     'image_path' => 'images/emotions/jealous.png',     'icon' => '😒'],
                ['category' => 'Emotions', 'word_en' => 'Relieved',    'image_path' => 'images/emotions/relieved.png',    'icon' => '😌'],
                ['category' => 'Emotions', 'word_en' => 'Curious',     'image_path' => 'images/emotions/curious.png',     'icon' => '🤔'],
                ['category' => 'Emotions', 'word_en' => 'Disappointed', 'image_path' => 'images/emotions/disappointed.png', 'icon' => '😞'],
                ['category' => 'Emotions', 'word_en' => 'Optimistic',  'image_path' => 'images/emotions/optimistic.png',  'icon' => '🌟'],
                ['category' => 'Emotions', 'word_en' => 'Anxious',     'image_path' => 'images/emotions/anxious.png',     'icon' => '😰'],
                ['category' => 'Emotions', 'word_en' => 'Confident',   'image_path' => 'images/emotions/confident.png',   'icon' => '💪'],
                ['category' => 'Emotions', 'word_en' => 'Embarrassed', 'image_path' => 'images/emotions/embarrassed.png', 'icon' => '😳'],

                // Occupations
                ['category' => 'Occupations', 'word_en' => 'Doctor',    'image_path' => 'images/occupations/doctor.png',    'icon' => '👨🏿‍⚕️'],
                ['category' => 'Occupations', 'word_en' => 'Nurse',     'image_path' => 'images/occupations/nurse.png',     'icon' => '👩🏿‍⚕️'],
                ['category' => 'Occupations', 'word_en' => 'Teacher',   'image_path' => 'images/occupations/teacher.png',   'icon' => '👩🏿‍🏫'],
                ['category' => 'Occupations', 'word_en' => 'Engineer',  'image_path' => 'images/occupations/engineer.png',  'icon' => '👨🏿‍💻'],
                ['category' => 'Occupations', 'word_en' => 'Farmer',    'image_path' => 'images/occupations/farmer.png',    'icon' => '👩🏿‍🌾'],
                ['category' => 'Occupations', 'word_en' => 'Driver',    'image_path' => 'images/occupations/driver.png',    'icon' => '🚗'],         // No person emoji, so left as car
                ['category' => 'Occupations', 'word_en' => 'Chef',      'image_path' => 'images/occupations/chef.png',      'icon' => '👨🏿‍🍳'],
                ['category' => 'Occupations', 'word_en' => 'Police',    'image_path' => 'images/occupations/police.png',    'icon' => '👮🏿‍♂️'],
                ['category' => 'Occupations', 'word_en' => 'Firefighter', 'image_path' => 'images/occupations/firefighter.png', 'icon' => '👨‍🚒'],
                ['category' => 'Occupations', 'word_en' => 'Scientist',  'image_path' => 'images/occupations/scientist.png',  'icon' => '🔬'],
                ['category' => 'Occupations', 'word_en' => 'Artist',     'image_path' => 'images/occupations/artist.png',     'icon' => '🎨'],
                ['category' => 'Occupations', 'word_en' => 'Musician',   'image_path' => 'images/occupations/musician.png',   'icon' => '🎤'],
                ['category' => 'Occupations', 'word_en' => 'Writer',     'image_path' => 'images/occupations/writer.png',     'icon' => '✍️'],
                ['category' => "Occupations", 	"word_en"	=> "Actor", 	'image_path'=>	"images/occupations/actor.png",		"icon"=> "🎭"],
                ['category' => "Occupations", 	"word_en"	=> "Journalist", 	'image_path'=>	"images/occupations/journalist.png",        "icon"=> "📰"],
                ['category' => 'Occupations', 'word_en' => 'Firefighter', 'image_path' => 'images/occupations/firefighter.png', 'icon' => '👨‍🚒'],
                ['category' => 'Occupations', 'word_en' => 'Pilot', 'image_path' => 'images/occupations/pilot.png', 'icon' => '✈️'],
                ['category' => 'Occupations', 'word_en' => 'Scientist', 'image_path' => 'images/occupations/scientist.png', 'icon' => '🔬'],
                ['category' => 'Occupations', 'word_en' => 'Artist', 'image_path' => 'images/occupations/artist.png', 'icon' => '🎨'],
                ['category' => 'Occupations', 'word_en' => 'Musician', 'image_path' => 'images/occupations/musician.png', 'icon' => '🎤'],
                ['category' => 'Occupations', 'word_en' => 'Writer', 'image_path' => 'images/occupations/writer.png', 'icon' => '✍️'],
                ['category' => 'Occupations', 'word_en' => 'Actor', 'image_path' => 'images/occupations/actor.png', 'icon' => '🎭'],
                ['category' => 'Occupations', 'word_en' => 'Journalist', 'image_path' => 'images/occupations/journalist.png', 'icon' => '📰'],
                ['category' => 'Occupations', 'word_en' => 'Businessperson', 	'image_path'=>	"images/occupations/businessperson.png",		"icon"=> "💼"],
                ['category' => "Occupations", 	"word_en"	=> "Accountant", 	'image_path'=>	"images/occupations/accountant.png",		"icon"=> "📊"],
                ['category' => 'Occupations', 'word_en' => 'Electrician', 'image_path' => 'images/occupations/electrician.png', 'icon' => '🔌'],
                ['category' => 'Occupations', 'word_en' => 'Plumber', 'image_path' => 'images/occupations/plumber.png', 'icon' => '🚰'],
                ['category' => 'Occupations', 'word_en' => 'Construction Worker', 'image_path' => 'images/occupations/construction_worker.png', 'icon' => '👷🏿‍♂️'],
                ['category' => 'Occupations', 'word_en' => 'Mechanic', 'image_path' => 'images/occupations/mechanic.png', 'icon' => '🔧'],
                ['category' => 'Occupations', 'word_en' => 'Architect', 'image_path' => 'images/occupations/architect.png', 'icon' => '🏗️'],
                ['category' => 'Occupations', 'word_en' => 'Photographer', 'image_path' => 'images/occupations/photographer.png', 'icon' => '📸'],
                ['category' => 'Occupations', 'word_en' => 'Veterinarian', 	'image_path'=>	"images/occupations/veterinarian.png",		"icon"=> "🐾"],
                ['category' => 'Occupations', 'word_en' => 'Veterinarian', 'image_path' => 'images/occupations/veterinarian.png', 'icon' => '🐾'],
                ['category' => 'Occupations', 'word_en' => 'Librarian', 'image_path' => 'images/occupations/librarian.png', 'icon' => '📚'],
                ['category' => 'Occupations', 'word_en' => 'Pharmacist', 'image_path' => 'images/occupations/pharmacist.png', 'icon' => '💊'],
                ['category' => 'Occupations', 'word_en' => 'Social Worker', 'image_path' => 'images/occupations/social_worker.png', 'icon' => '🧑🏿‍⚕️'],
                ['category' => 'Occupations', 'word_en' => 'Psychologist', 'image_path' => 'images/occupations/psychologist.png', 'icon' => '🧠'],
                ['category' => 'Occupations', 'word_en' => 'Dentist', 'image_path' => 'images/occupations/dentist.png', 'icon' => '🦷'],
                ['category' => 'Occupations', 'word_en' => 'Barista', 'image_path' => 'images/occupations/barista.png', 'icon' => '☕'],
                ['category' => 'Occupations', 'word_en' => 'Waiter', 	'image_path'=>	"images/occupations/waiter.png",		"icon"=> "🍽️"],
                ['category' => "Occupations", 	"word_en"	=> "Cashier", 	'image_path'=>	"images/occupations/cashier.png",		"icon"=> "💰"],
                ['category' => "Occupations", 	"word_en"	=> "Security Guard", 	'image_path'=>	"images/occupations/security_guard.png",        "icon"=> "🛡️"],
                ['category' => "Occupations", 	"word_en"	=> "Delivery Person", 	'image_path'=>	"images/occupations/delivery_person.png",        "icon"=> "📦"],
                ['category' => "Occupations", 	"word_en"	=> "Real Estate Agent", 	'image_path'=>	"images/occupations/real_estate_agent.png",        "icon"=> "🏠"],

                // Tools
                ['category' => 'Tools', 'word_en' => 'Hammer', 'image_path' => 'images/tools/hammer.png', 'icon' => '🔨'],
                ['category' => 'Tools', 'word_en' => 'Screwdriver', 'image_path' => 'images/tools/screwdriver.png', 'icon' => '🪛'],
                ['category' => 'Tools', 'word_en' => 'Wrench', 'image_path' => 'images/tools/wrench.png', 'icon' => '🔧'],
                ['category' => 'Tools', 'word_en' => 'Pliers', 'image_path' => 'images/tools/pliers.png', 'icon' => '🦯'],
                ['category' => 'Tools', 'word_en' => 'Saw', 'image_path' => 'images/tools/saw.png', 'icon' => '🪚'],
                ['category' => 'Tools', 'word_en' => 'Drill', 'image_path' => 'images/tools/drill.png', 'icon' => '🔩'],
                ['category' => 'Tools', 'word_en' => "Measuring Tape", 	'image_path'=>	"images/tools/measuring_tape.png",		"icon"=> "📏"],
                ['category' => "Tools", 	"word_en"	=> "Level", 	'image_path'=>	"images/tools/level.png",		"icon"=> "📐"],
                ['category' => "Tools", 	"word_en"	=> "Utility Knife", 	'image_path'=>	"images/tools/utility_knife.png",		"icon"=> "🔪"],
                ['category' => "Tools", 	"word_en"	=> "Chisel", 	'image_path'=>	"images/tools/chisel.png",		"icon"=> "🪓"],
                ['category' => "Tools", 	"word_en"	=> "File", 	'image_path'=>	"images/tools/file.png",		"icon"=> "🗃️"],
                ['category' => "Tools", 	"word_en"	=> "Clamp", 	'image_path'=>	"images/tools/clamp.png",		"icon"=> "🗜️"],
                ['category' => "Tools", 	"word_en"	=> "Soldering Iron", 	'image_path'=>	"images/tools/soldering_iron.png",        "icon"=> "🔥"],
                ['category' => "Tools", 	"word_en"	=> "Toolbox", 	'image_path'=>	"images/tools/toolbox.png",        "icon"=> "🧰"],
                ['category' => "Tools", 	"word_en"	=> "Workbench", 	'image_path'=>	"images/tools/workbench.png",        "icon"=> "🪑"], // Chair used as workbench substitute
                ['category' => "Tools", 	"word_en"	=> "Safety Goggles", 	'image_path'=>	"images/tools/safety_goggles.png",        "icon"=> "🕶️"],
                ['category' => "Tools", 	"word_en"	=> "Gloves", 	'image_path'=>	"images/tools/gloves.png",        "icon"=> "🧤"],
                ['category' => "Tools", 	"word_en"	=> "Dust Mask", 	'image_path'=>	"images/tools/dust_mask.png",        "icon"=> "😷"],
                ['category' => "Tools", 	"word_en"	=> "Hard Hat", 	'image_path'=>	"images/tools/hard_hat.png",        "icon"=> "⛑️"],
                ['category' => "Tools", 	"word_en"	=> "Safety Vest", 	'image_path'=>	"images/tools/safety_vest.png",        "icon"=> "🦺"],
                ['category' => "Tools", 	"word_en"	=> "Ladder", 	'image_path'=>	"images/tools/ladder.png",        "icon"=> "🪜"],
                ['category' => "Tools", 	"word_en"	=> "Extension Cord", 	'image_path'=>	"images/tools/extension_cord.png",        "icon"=> "🔌"],
                ['category' => "Tools", 	"word_en"	=> "Flashlight", 	'image_path'=>	"images/tools/flashlight.png",        "icon"=> "🔦"],
                ['category' => "Tools", 	"word_en"	=> "Multitool", 	'image_path'=>	"images/tools/multitool.png",        "icon"=> "🛠️"],
                ['category' => "Tools", 	"word_en"	=> "Socket Set", 	'image_path'=>	"images/tools/socket_set.png",        "icon"=> "🔩"],
                ['category' => "Tools", 	"word_en"	=> "Crowbar", 	'image_path'=>	"images/tools/crowbar.png",        "icon"=> "🪓"],
                ['category' => "Tools", 	"word_en"	=> "Pipe Wrench", 	'image_path'=>	"images/tools/pipe_wrench.png",        "icon"=> "🔧"],
                ['category' => "Tools", 	"word_en"	=> "Bolt Cutter", 	'image_path'=>	"images/tools/bolt_cutter.png",        "icon"=> "🔩"],
                

                // Travel
                ['category' => 'Travel', 'word_en' => 'Passport', 'image_path' => 'images/travel/passport.png', 'icon' => '🛂'],
                ['category' => 'Travel', 'word_en' => 'Suitcase', 'image_path' => 'images/travel/suitcase.png', 'icon' => '🧳'],
                ['category' => 'Travel', 'word_en' => 'Airplane Ticket', 'image_path' => 'images/travel/airplane_ticket.png', 'icon' => '🎫'],
                ['category' => 'Travel', 'word_en' => 'Hotel', 'image_path' => 'images/travel/hotel.png', 'icon' => '🏨'],
                ['category' => 'Travel', 'word_en' => 'Map', 'image_path' => 'images/travel/map.png', 'icon' => '🗺️'],
                ['category' => 'Travel', 'word_en' => 'Camera', 'image_path' => 'images/travel/camera.png', 'icon' => '📷'],
                ['category' => 'Travel', 'word_en' => "Guidebook", 	'image_path'=>	"images/travel/guidebook.png",		"icon"=> "📖"],
                ['category' => "Travel", 	"word_en"	=> "Backpack", 	'image_path'=>	"images/travel/backpack.png",		"icon"=> "🎒"],
                ['category' => "Travel", 	"word_en"	=> "Sunglasses", 	'image_path'=>	"images/travel/sunglasses.png",		"icon"=> "🕶️"],
                ['category' => "Travel", 	"word_en"	=> "Sunscreen", 	'image_path'=>	"images/travel/sunscreen.png",		"icon"=> "☀️"],
                ['category' => "Travel", 	"word_en"	=> "Hat", 	'image_path'=>	"images/travel/hat.png",		"icon"=> "🧢"],
                ['category' => "Travel", 	"word_en"	=> "Beach Towel", 	'image_path'=>	"images/travel/beach_towel.png",        "icon"=> "🏖️"],
                ['category' => "Travel", 	"word_en"	=> "Flip Flops", 	'image_path'=>	"images/travel/flip_flops.png",        "icon"=> "🩴"],
                ['category' => "Travel", 	"word_en"    => "Travel Pillow", 	'image_path'=>	"images/travel/travel_pillow.png",        "icon"=> "🛏️"],
                ['category' => "Travel", 	"word_en"	=> "Water Bottle", 	'image_path'=>	"images/travel/water_bottle.png",        "icon"=> "💧"],
                ['category' => "Travel", 	"word_en"	=> "Snacks", 	'image_path'=>	"images/travel/snacks.png",        "icon"=> "🍫"],
                ['category' => "Travel", 	"word_en"	=> "First Aid Kit", 	'image_path'=>	"images/travel/first_aid_kit.png",        "icon"=> "🚑"],
                ['category' => "Travel", 	"word_en"	=> "Travel Adapter", 	'image_path'=>	"images/travel/travel_adapter.png",        "icon"=> "🔌"],
                ['category' => "Travel", 	"word_en"	=> "Travel Insurance", 	'image_path'=>	"images/travel/travel_insurance.png",        "icon"=> "🛡️"],
                ['category' => "Travel", 	"word_en"	=> "Currency Exchange", 	'image_path'=>	"images/travel/currency_exchange.png",        "icon"=> "💱"],
                ['category' => "Travel", 	"word_en"	=> "Emergency Contacts", 	'image_path'=>	"images/travel/emergency_contacts.png",        "icon"=> "📞"],


                //Clothing
                ['category' => 'Clothing', 'word_en' => 'Shirt',  'image_path' => 'images/clothing/shirt.png',  'icon' => '👕'],
                ['category' => 'Clothing', 'word_en' => 'Pants',  'image_path' => 'images/clothing/pants.png',  'icon' => '👖'],
                ['category' => 'Clothing', 'word_en' => 'Dress',  'image_path' => 'images/clothing/dress.png',  'icon' => '👗'],
                ['category' => 'Clothing', 'word_en' => 'Hat',    'image_path' => 'images/clothing/hat.png',    'icon' => '🎩'],
                ['category' => 'Clothing', 'word_en' => 'Shoes',  'image_path' => 'images/clothing/shoes.png',  'icon' => '👟'],
                ['category' => 'Clothing', 'word_en' => 'Jacket', 'image_path' => 'images/clothing/jacket.png', 'icon' => '🧥'],
                ['category' => 'Clothing', 'word_en' => 'Skirt',  'image_path' => 'images/clothing/skirt.png',  'icon' => '👗'],  // Same as dress emoji
                ['category' => 'Clothing', 'word_en' => 'Socks',  'image_path' => 'images/clothing/socks.png',  'icon' => '🧦'],
                ['category' => 'Clothing', 'word_en' => 'Belt',   'image_path' => 'images/clothing/belt.png',   'icon' => '🧣'],  // No belt emoji, used scarf as closest
                ['category' => 'Clothing', 'word_en' => 'Gloves', 'image_path' => 'images/clothing/gloves.png', 'icon' => '🧤'],
                ['category' => 'Clothing', 'word_en' => 'Scarf',  'image_path' => 'images/clothing/scarf.png',  'icon' => '🧣'],
                ['category' => 'Clothing', 'word_en' => 'Sweater', 'image_path' => 'images/clothing/sweater.png', 'icon' => '🧥'], // Same as jacket emoji
                ['category' => 'Clothing', 'word_en' => 'Shorts', 	'image_path'=>	"images/clothing/shorts.png",		"icon"=> "🩳"],
                ['category' => "Clothing", 	"word_en"	=> "Swimsuit", 	'image_path'=>	"images/clothing/swimsuit.png",		"icon"=> "👙"],
                ['category' => "Clothing", 	"word_en"	=> "Sunglasses", 	'image_path'=>	"images/clothing/sunglasses.png",		"icon"=> "🕶️"],
                ['category' => "Clothing", 	"word_en"	=> "Watch", 	'image_path'=>	"images/clothing/watch.png",		"icon"=> "⌚"],
                ['category' => "Clothing", 	"word_en"	=> "Necklace", 	'image_path'=>	"images/clothing/necklace.png",        "icon"=> "💍"],
                ['category' => "Clothing", 	"word_en"	=> "Earrings", 	'image_path'=>	"images/clothing/earrings.png",        "icon"=> "💎"],
                ['category' => "Clothing", 	"word_en"    => "Bracelet", 	'image_path'=>	"images/clothing/bracelet.png",        "icon"=> "📿"],
                ['category' => "Clothing", 	"word_en"	=> "Ring", 	'image_path'=>	"images/clothing/ring.png",        "icon"=> "💍"],
                ['category' => "Clothing", 	"word_en"	=> "Bikini", 	'image_path'=>	"images/clothing/bikini.png",        "icon"=> "👙"],
                ['category' => "Clothing", 	"word_en"	=> "Overalls", 	'image_path'=>	"images/clothing/overalls.png",        "icon"=> "👖"],
                ['category' => "Clothing", 	"word_en"	=> "Kimono", 	'image_path'=>	"images/clothing/kimono.png",        "icon"=> "👘"],
                ['category' => "Clothing", 	"word_en"	=> "Tuxedo", 	'image_path'=>	"images/clothing/tuxedo.png",        "icon"=> "🤵"],
                ['category' => "Clothing", 	"word_en"	=> "Uniform", 	'image_path'=>	"images/clothing/uniform.png",        "icon"=> "👮"],
                ['category' => "Clothing", 	"word_en"	=> "Costume", 	'image_path'=>	"images/clothing/costume.png",        "icon"=> "🎭"],
                ['category' => "Clothing", 	"word_en"	=> "Poncho", 	'image_path'=>	"images/clothing/poncho.png",        "icon"=> "🧥"], // Same as jacket emoji
                ['category' => "Clothing", 	"word_en"	=> "Raincoat", 	'image_path'=>	"images/clothing/raincoat.png",        "icon"=> "🧥"], // Same as jacket emoji
                ['category' => "Clothing", 	"word_en"	=> "Windbreaker", 	'image_path'=>	"images/clothing/windbreaker.png",        "icon"=> "🧥"], // Same as jacket emoji

                // Time
                ['category' => 'Time', 'word_en' => 'Day',     'image_path' => 'images/time/day.png',     'icon' => '🌞'],
                ['category' => 'Time', 'word_en' => 'Night',   'image_path' => 'images/time/night.png',   'icon' => '🌜'],
                ['category' => 'Time', 'word_en' => 'Hour',    'image_path' => 'images/time/hour.png',    'icon' => '🕐'],
                ['category' => 'Time', 'word_en' => 'Minute',  'image_path' => 'images/time/minute.png',  'icon' => '⏰'],
                ['category' => 'Time', 'word_en' => 'Second',  'image_path' => 'images/time/second.png',  'icon' => '⏱️'],
                ['category' => 'Time', 'word_en' => 'Week',    'image_path' => 'images/time/week.png',    'icon' => '📅'],
                ['category' => 'Time', 'word_en' => 'Month',   'image_path' => 'images/time/month.png',   'icon' => '🗓️'],
                ['category' => 'Time', 'word_en' => 'Year',    'image_path' => 'images/time/year.png',    'icon' => '📆'],
                ['category' => 'Time', 'word_en' => 'Morning', 'image_path' => 'images/time/morning.png', 'icon' => '🌅'],
                ['category' => 'Time', 'word_en' => 'Evening', 'image_path' => 'images/time/evening.png', 'icon' => '🌇'],
                ['category' => 'Time', 'word_en' => 'Afternoon', 'image_path' => 'images/time/afternoon.png', 'icon' => '🌄'],
                ['category' => 'Time', 'word_en' => 'Midnight',  'image_path' => 'images/time/midnight.png',  'icon' => '🌌'],
                ['category' => 'Time', 'word_en' => 'Dawn',      'image_path' => 'images/time/dawn.png',      'icon' => '🌅'],
                ['category' => 'Time', 'word_en' => 'Dusk',      'image_path' => 'images/time/dusk.png',      'icon' => '🌆'],
                ['category' => 'Time', 'word_en' => 'Century',   'image_path' => 'images/time/century.png',   'icon' => '📜'],
                ['category' => 'Time', 'word_en' => 'Decade',    'image_path' => 'images/time/decade.png',    'icon' => '📅'],
                ['category' => 'Time', 'word_en' => 'Eternity',  'image_path' => 'images/time/eternity.png',  'icon' => '♾️'],
                ['category' => 'Time', 'word_en' => 'Schedule',  'image_path' => 'images/time/schedule.png',  'icon' => '📅'],
                ['category' => 'Time', 'word_en' => 'Deadline',  'image_path' => 'images/time/deadline.png',  'icon' => '⏳'],
                ['category' => 'Time', 'word_en' => 'Timetable',  'image_path' => 'images/time/timetable.png',  'icon' => '🗓️'],
                ['category' => 'Time', 'word_en' => 'Clock',     'image_path' => 'images/time/clock.png',     'icon' => '🕰️'],

                // Music
                ['category' => 'Music', 'word_en' => 'Song',     'image_path' => 'images/music/song.png',     'icon' => '🎵'],
                ['category' => 'Music', 'word_en' => 'Dance',    'image_path' => 'images/music/dance.png',    'icon' => '💃'],
                ['category' => 'Music', 'word_en' => 'Guitar',   'image_path' => 'images/music/guitar.png',   'icon' => '🎸'],
                ['category' => 'Music', 'word_en' => 'Piano',    'image_path' => 'images/music/piano.png',    'icon' => '🎹'],
                ['category' => 'Music', 'word_en' => 'Drum',     'image_path' => 'images/music/drum.png',     'icon' => '🥁'],
                ['category' => 'Music', 'word_en' => 'Singing',  'image_path' => 'images/music/singing.png',  'icon' => '🎤'],
                ['category' => 'Music', 'word_en' => 'Band',     'image_path' => 'images/music/band.png',     'icon' => '🎷'],
                ['category' => 'Music', 'word_en' => 'Concert',  'image_path' => 'images/music/concert.png',  'icon' => '🎫'],
                ['category' => 'Music', 'word_en' => 'Melody',   'image_path' => 'images/music/melody.png',   'icon' => '🎶'],
                ['category' => 'Music', 'word_en' => 'Rhythm',   'image_path' => 'images/music/rhythm.png',   'icon' => '🥁'],
                ['category' => 'Music', 'word_en' => 'Harmony',  'image_path' => 'images/music/harmony.png',  'icon' => '🎼'],
                ['category' => 'Music', 'word_en' => 'Composer', 'image_path' => 'images/music/composer.png', 'icon' => '🎼'],
                ['category' => 'Music', 'word_en' => 'Orchestra', 'image_path' => 'images/music/orchestra.png', 'icon' => '🎻'],
                ['category' => 'Music', 'word_en' => 'DJ',       'image_path' => 'images/music/dj.png',       'icon' => '🎧'],
                ['category' => 'Music', 'word_en' => 'Album',    'image_path' => 'images/music/album.png',    'icon' => '💿'],
                ['category' => 'Music', 'word_en' => 'Playlist', 	'image_path'=>	"images/music/playlist.png",		"icon"=> "📀"],
                ['category' => "Music", 	"word_en"	=> "Vinyl Record", 	'image_path'=>	"images/music/vinyl_record.png",		"icon"=> "🎵"],
                ['category' => "Music", 	"word_en"	=> "Sheet Music", 	'image_path'=>	"images/music/sheet_music.png",		"icon"=> "🎶"],
                ['category' => "Music", 	"word_en"	=> "Musical Note", 	'image_path'=>	"images/music/musical_note.png",        "icon"=> "🎵"],
                ['category' => "Music", 	"word_en"    => "Soundtrack", 	'image_path'=>	"images/music/soundtrack.png",        "icon"=> "🎬"],

                // Numbers (1–10)
                ['category' => 'Numbers', 'word_en' => 'One',                 'numeric_value' => 1],
                ['category' => 'Numbers', 'word_en' => 'Two',                 'numeric_value' => 2],
                ['category' => 'Numbers', 'word_en' => 'Three',               'numeric_value' => 3],
                ['category' => 'Numbers', 'word_en' => 'Four',                'numeric_value' => 4],
                ['category' => 'Numbers', 'word_en' => 'Five',                'numeric_value' => 5],
                ['category' => 'Numbers', 'word_en' => 'Six',                 'numeric_value' => 6],
                ['category' => 'Numbers', 'word_en' => 'Seven',               'numeric_value' => 7],
                ['category' => 'Numbers', 'word_en' => 'Eight',               'numeric_value' => 8],
                ['category' => 'Numbers', 'word_en' => 'Nine',                'numeric_value' => 9],
                ['category' => 'Numbers', 'word_en' => 'Ten',                 'numeric_value' => 10],
                ['category' => 'Numbers', 'word_en' => 'Twenty',              'numeric_value' => 20],
                ['category' => 'Numbers', 'word_en' => 'Thirty',              'numeric_value' => 30],
                ['category' => 'Numbers', 'word_en' => 'Forty',               'numeric_value' => 40],
                ['category' => 'Numbers', 'word_en' => 'Fifty',               'numeric_value' => 50],
                ['category' => 'Numbers', 'word_en' => 'Sixty',               'numeric_value' => 60],
                ['category' => 'Numbers', 'word_en' => 'Seventy',             'numeric_value' => 70],
                ['category' => 'Numbers', 'word_en' => 'Eighty',              'numeric_value' => 80],
                ['category' => 'Numbers', 'word_en' => 'Ninety',              'numeric_value' => 90],
                ['category' => 'Numbers', 'word_en' => 'One Hundred',         'numeric_value' => 100],
                ['category' => 'Numbers', 'word_en' => 'Two Hundred',         'numeric_value' => 200],
                ['category' => 'Numbers', 'word_en' => 'Three Hundred',       'numeric_value' => 300],
                ['category' => 'Numbers', 'word_en' => 'Four Hundred',        'numeric_value' => 400],
                ['category' => 'Numbers', 'word_en' => 'Five Hundred',        'numeric_value' => 500],
                ['category' => 'Numbers', 'word_en' => 'Six Hundred',         'numeric_value' => 600],
                ['category' => 'Numbers', 'word_en' => 'Seven Hundred',       'numeric_value' => 700],
                ['category' => 'Numbers', 'word_en' => 'Eight Hundred',       'numeric_value' => 800],
                ['category' => 'Numbers', 'word_en' => 'Nine Hundred',        'numeric_value' => 900],
                ['category' => 'Numbers', 'word_en' => 'One Thousand',        'numeric_value' => 1000],
                ['category' => 'Numbers', 'word_en' => 'One Hundred Thousand','numeric_value' => 100000],
                ['category' => 'Numbers', 'word_en' => 'Five Hundred Thousand','numeric_value' => 500000],
                ['category' => 'Numbers', 'word_en' => 'One Million',         'numeric_value' => 1000000],
                // ['category' => 'Numbers', 'word_en' => 'Ten Million',         'numeric_value' => 10000000],
                // ['category' => 'Numbers', 'word_en' => 'One Billion',         'numeric_value' => 1000000000],
                // ['category' => 'Numbers', 'word_en' => 'One Trillion',        'numeric_value' => 1000000000000],
        ];


        foreach ($entries as $entry) {
            $categoryName = $entry['category'];

            if (!isset($categories[$categoryName])) {
                if (!in_array($categoryName, $missingCategories)) {
                    $this->command->error("Category '{$categoryName}' not found!");
                    $missingCategories[] = $categoryName;
                }
                continue;
            }

            $category = $categories[$categoryName];
            $baseSlug = Str::slug($entry['word_en']);
            $slug = $baseSlug;

            // Append category slug if there's a slug conflict
            if (DictionaryMainEntry::where('slug_en', $slug)->exists()) {
                $slug = $baseSlug . '-' . Str::slug($categoryName);
            }

            DictionaryMainEntry::updateOrCreate(
                [
                    'word_en' => $entry['word_en'],
                    'category_id' => $category->id,
                ],
                [
                    'category_id' => $category->id,
                    'word_en'     => $entry['word_en'],
                    'slug_en'     => $slug,
                    'image_path'  => $entry['image_path'] ?? null,
                    'user_id'     => 1, // Assuming admin or default user
                    'icon'        => $entry['icon'] ?? null,
                    'color_code'  => $entry['color_code'] ?? null,
                    'numeric_value' => $entry['numeric_value'] ?? null,
                ]
            );
        }
    }
}
