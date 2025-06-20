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
        // Example entries to seed
        $entries = [
                // Greetings
                ['category' => 'Greetings', 'word_en' => 'Hello', 'image_path' => 'images/greetings/hello.png'],
                ['category' => 'Greetings', 'word_en' => 'Goodbye', 'image_path' => 'images/greetings/goodbye.png'],
                ['category' => 'Greetings', 'word_en' => 'Please', 'image_path' => 'images/greetings/please.png'],
                ['category' => 'Greetings', 'word_en' => 'Thank you', 'image_path' => 'images/greetings/thank_you.png'],
                ['category' => 'Greetings', 'word_en' => 'Yes', 'image_path' => 'images/greetings/yes.png'],
                ['category' => 'Greetings', 'word_en' => 'No', 'image_path' => 'images/greetings/no.png'],
                ['category' => 'Greetings', 'word_en' => 'Excuse me', 'image_path' => 'images/greetings/excuse_me.png'],
                ['category' => 'Greetings', 'word_en' => 'Good morning', 'image_path' => 'images/greetings/good_morning.png'],
                ['category' => 'Greetings', 'word_en' => 'Good evening', 'image_path' => 'images/greetings/good_evening.png'],
                ['category' => 'Greetings', 'word_en' => 'Good night', 'image_path' => 'images/greetings/good_night.png'],
                ['category' => 'Greetings', 'word_en' => 'How are you', 'image_path' => 'images/greetings/how_are_you.png'],
                ['category' => 'Greetings', 'word_en' => 'Welcome', 'image_path' => 'images/greetings/welcome.png'],
                ['category' => 'Greetings', 'word_en' => 'See you later', 'image_path' => 'images/greetings/see_you_later.png'],
                ['category' => 'Greetings', 'word_en' => 'Take care', 'image_path' => 'images/greetings/take_care.png'],
                ['category' => 'Greetings', 'word_en' => 'Nice to meet you', 'image_path' => 'images/greetings/nice_to_meet_you.png'],
                ['category' => 'Greetings', 'word_en' => 'Have a nice day', 'image_path' => 'images/greetings/have_a_nice_day.png'],
                ['category' => 'Greetings', 'word_en' => 'Cheers', 'image_path' => 'images/greetings/cheers.png'],
                ['category' => 'Greetings', 'word_en' => 'Good afternoon', 'image_path' => 'images/greetings/good_afternoon.png'],
                ['category' => 'Greetings', 'word_en' => 'What’s up', 'image_path' => 'images/greetings/whats_up.png'],
                ['category' => 'Greetings', 'word_en' => 'Long time no see', 'image_path' => 'images/greetings/long_time_no_see.png'],

                // Animals
                ['category' => 'Animals', 'word_en' => 'Dog', 'image_path' => 'images/animals/dog.png'],
                ['category' => 'Animals', 'word_en' => 'Cat', 'image_path' => 'images/animals/cat.png'],
                ['category' => 'Animals', 'word_en' => 'Bird', 'image_path' => 'images/animals/bird.png'],
                ['category' => 'Animals', 'word_en' => 'Fish', 'image_path' => 'images/animals/fish.png'],
                ['category' => 'Animals', 'word_en' => 'Horse', 'image_path' => 'images/animals/horse.png'],
                ['category' => 'Animals', 'word_en' => 'Elephant', 'image_path' => 'images/animals/elephant.png'],
                ['category' => 'Animals', 'word_en' => 'Lion', 'image_path' => 'images/animals/lion.png'],
                ['category' => 'Animals', 'word_en' => 'Tiger', 'image_path' => 'images/animals/tiger.png'],
                ['category' => 'Animals', 'word_en' => 'Bear', 'image_path' => 'images/animals/bear.png'],
                ['category' => 'Animals', 'word_en' => 'Rabbit', 'image_path' => 'images/animals/rabbit.png'],
                ['category' => 'Animals', 'word_en' => 'Zebra', 'image_path' => 'images/animals/zebra.png'],
                ['category' => 'Animals', 'word_en' => 'Giraffe', 'image_path' => 'images/animals/giraffe.png'],
                ['category' => 'Animals', 'word_en' => 'Monkey', 'image_path' => 'images/animals/monkey.png'],
                ['category' => 'Animals', 'word_en' => 'Dolphin', 'image_path' => 'images/animals/dolphin.png'],
                ['category' => 'Animals', 'word_en' => 'Wolf', 'image_path' => 'images/animals/wolf.png'],
                ['category' => 'Animals', 'word_en' => 'Fox', 'image_path' => 'images/animals/fox.png'],
                ['category' => 'Animals', 'word_en' => 'Deer', 'image_path' => 'images/animals/deer.png'],
                ['category' => 'Animals', 'word_en' => 'Cow', 'image_path' => 'images/animals/cow.png'],
                ['category' => 'Animals', 'word_en' => 'Pig', 'image_path' => 'images/animals/pig.png'],
                ['category' => 'Animals', 'word_en' => 'Sheep', 'image_path' => 'images/animals/sheep.png'],
                ['category' => 'Animals', 'word_en' => 'Goat', 'image_path' => 'images/animals/goat.png'],
                ['category' => 'Animals', 'word_en' => 'Duck', 'image_path' => 'images/animals/duck.png'],
                ['category' => 'Animals', 'word_en' => 'Chicken', 'image_path' => 'images/animals/chicken.png'],
                ['category' => 'Animals', 'word_en' => 'Snake', 'image_path' => 'images/animals/snake.png'],
                ['category' => 'Animals', 'word_en' => 'Spider', 'image_path' => 'images/animals/spider.png'],
                ['category' => 'Animals', 'word_en' => 'Bee', 'image_path' => 'images/animals/bee.png'],
                ['category' => 'Animals', 'word_en' => 'Butterfly', 'image_path' => 'images/animals/butterfly.png'],
                ['category' => 'Animals', 'word_en' => 'Frog', 'image_path' => 'images/animals/frog.png'],
                ['category' => 'Animals', 'word_en' => 'Crab', 'image_path' => 'images/animals/crab.png'],
                ['category' => 'Animals', 'word_en' => 'Octopus', 'image_path' => 'images/animals/octopus.png'],
                ['category' => 'Animals', 'word_en' => 'Whale', 'image_path' => 'images/animals/whale.png'],
                ['category' => 'Animals', 'word_en' => 'Eagle', 'image_path' => 'images/animals/eagle.png'],
                ['category' => 'Animals', 'word_en' => 'Parrot', 'image_path' => 'images/animals/parrot.png'],
                ['category' => 'Animals', 'word_en' => 'Crow', 'image_path' => 'images/animals/crow.png'],
                ['category' => 'Animals', 'word_en' => 'Hawk', 'image_path' => 'images/animals/hawk.png'],
                ['category' => 'Animals', 'word_en' => 'Seal', 'image_path' => 'images/animals/seal.png'],
                ['category' => 'Animals', 'word_en' => 'Otter', 'image_path' => 'images/animals/otter.png'],
                ['category' => 'Animals', 'word_en' => 'Raccoon', 'image_path' => 'images/animals/raccoon.png'],
                ['category' => 'Animals', 'word_en' => 'Skunk', 'image_path' => 'images/animals/skunk.png'],
                ['category' => 'Animals', 'word_en' => 'Lizard', 'image_path' => 'images/animals/lizard.png'],
                ['category' => 'Animals', 'word_en' => 'Turtle', 'image_path' => 'images/animals/turtle.png'],
                ['category' => 'Animals', 'word_en' => 'Camel', 'image_path' => 'images/animals/camel.png'],

                // Food

                ['category' => 'Food', 'word_en' => 'Apple', 'image_path' => 'images/food/apple.png'],
                ['category' => 'Food', 'word_en' => 'Bread', 'image_path' => 'images/food/bread.png'],
                ['category' => 'Food', 'word_en' => 'Water', 'image_path' => 'images/food/water.png'],
                ['category' => 'Food', 'word_en' => 'Milk', 'image_path' => 'images/food/milk.png'],
                ['category' => 'Food', 'word_en' => 'Rice', 'image_path' => 'images/food/rice.png'],
                ['category' => 'Food', 'word_en' => 'Chicken', 'image_path' => 'images/food/chicken.png'],
                ['category' => 'Food', 'word_en' => 'Pasta', 'image_path' => 'images/food/pasta.png'],
                ['category' => 'Food', 'word_en' => 'Cheese', 'image_path' => 'images/food/cheese.png'],
                ['category' => 'Food', 'word_en' => 'Egg', 'image_path' => 'images/food/egg.png'],
                ['category' => 'Food', 'word_en' => 'Fruit', 'image_path' => 'images/food/fruit.png'],
                ['category' => 'Food', 'word_en' => 'Vegetable', 'image_path' => 'images/food/vegetable.png'],
                ['category' => 'Food', 'word_en' => 'Meat', 'image_path' => 'images/food/meat.png'],
                ['category' => 'Food', 'word_en' => 'Soup', 'image_path' => 'images/food/soup.png'],
                ['category' => 'Food', 'word_en' => 'Salad', 'image_path' => 'images/food/salad.png'],
                ['category' => 'Food', 'word_en' => 'Pizza', 'image_path' => 'images/food/pizza.png'],
                ['category' => 'Food', 'word_en' => 'Burger', 'image_path' => 'images/food/burger.png'],
                ['category' => 'Food', 'word_en' => 'Fries', 'image_path' => 'images/food/fries.png'],
                ['category' => 'Food', 'word_en' => 'Cake', 'image_path' => 'images/food/cake.png'],
                ['category' => 'Food', 'word_en' => 'Coffee', 'image_path' => 'images/food/coffee.png'],
                ['category' => 'Food', 'word_en' => 'Tea', 'image_path' => 'images/food/tea.png'],
                ['category' => 'Food', 'word_en' => 'Juice', 'image_path' => 'images/food/juice.png'],
                ['category' => 'Food', 'word_en' => 'Sugar', 'image_path' => 'images/food/sugar.png'],
                ['category' => 'Food', 'word_en' => 'Salt', 'image_path' => 'images/food/salt.png'],
                ['category' => 'Food', 'word_en' => 'Butter', 'image_path' => 'images/food/butter.png'],
                ['category' => 'Food', 'word_en' => 'Oil', 'image_path' => 'images/food/oil.png'],

                // Sports
                ['category' => 'Sports', 'word_en' => 'Football', 'image_path' => 'images/sports/football.png'],
                ['category' => 'Sports', 'word_en' => 'Basketball', 'image_path' => 'images/sports/basketball.png'],
                ['category' => 'Sports', 'word_en' => 'Tennis', 'image_path' => 'images/sports/tennis.png'],
                ['category' => 'Sports', 'word_en' => 'Swimming', 'image_path' => 'images/sports/swimming.png'],
                ['category' => 'Sports', 'word_en' => 'Running', 'image_path' => 'images/sports/running.png'],
                ['category' => 'Sports', 'word_en' => 'Gym', 'image_path' => 'images/sports/gym.png'],
                ['category' => 'Sports', 'word_en' => 'Cycling', 'image_path' => 'images/sports/cycling.png'],
                ['category' => 'Sports', 'word_en' => 'Golf', 'image_path' => 'images/sports/golf.png'],
                ['category' => 'Sports', 'word_en' => 'Yoga', 'image_path' => 'images/sports/yoga.png'],
                ['category' => 'Sports', 'word_en' => 'Baseball', 'image_path' => 'images/sports/baseball.png'],
                ['category' => 'Sports', 'word_en' => 'Volleyball', 'image_path' => 'images/sports/volleyball.png'],
                ['category' => 'Sports', 'word_en' => 'Skiing', 'image_path' => 'images/sports/skiing.png'],
                ['category' => 'Sports', 'word_en' => 'Boxing', 'image_path' => 'images/sports/boxing.png'],
                ['category' => 'Sports', 'word_en' => 'Karate', 'image_path' => 'images/sports/karate.png'],
                ['category' => 'Sports', 'word_en' => 'Judo', 'image_path' => 'images/sports/judo.png'],
                ['category' => 'Sports', 'word_en' => 'Skating', 'image_path' => 'images/sports/skating.png'],
                ['category' => 'Sports', 'word_en' => 'Surfing', 'image_path' => 'images/sports/surfing.png'],
                ['category' => 'Sports', 'word_en' => 'Hiking', 'image_path' => 'images/sports/hiking.png'],
                ['category' => 'Sports', 'word_en' => 'Climbing', 'image_path' => 'images/sports/climbing.png'],

                // People
                ['category' => 'People', 'word_en' => 'Man', 'image_path' => 'images/people/man.png'],
                ['category' => 'People', 'word_en' => 'Woman', 'image_path' => 'images/people/woman.png'],
                ['category' => 'People', 'word_en' => 'Child', 'image_path' => 'images/people/child.png'],
                ['category' => 'People', 'word_en' => 'Teacher', 'image_path' => 'images/people/teacher.png'],
                ['category' => 'People', 'word_en' => 'Doctor', 'image_path' => 'images/people/doctor.png'],
                ['category' => 'People', 'word_en' => 'Friend', 'image_path' => 'images/people/friend.png'],
                ['category' => 'People', 'word_en' => 'Student', 'image_path' => 'images/people/student.png'],
                ['category' => 'People', 'word_en' => 'Family', 'image_path' => 'images/people/family.png'],
                ['category' => 'People', 'word_en' => 'Parent', 'image_path' => 'images/people/parent.png'],
                ['category' => 'People', 'word_en' => 'Brother', 'image_path' => 'images/people/brother.png'],
                ['category' => 'People', 'word_en' => 'Sister', 'image_path' => 'images/people/sister.png'],
                ['category' => 'People', 'word_en' => 'Grandparent', 'image_path' => 'images/people/grandparent.png'],
                ['category' => 'People', 'word_en' => 'Baby', 'image_path' => 'images/people/baby.png'],
                ['category' => 'People', 'word_en' => 'Boy', 'image_path' => 'images/people/boy.png'],
                ['category' => 'People', 'word_en' => 'Girl', 'image_path' => 'images/people/girl.png'],
                ['category' => 'People', 'word_en' => 'King', 'image_path' => 'images/people/king.png'],
                ['category' => 'People', 'word_en' => 'Queen', 'image_path' => 'images/people/queen.png'],
                ['category' => 'People', 'word_en' => 'Soldier', 'image_path' => 'images/people/soldier.png'],
                ['category' => 'People', 'word_en' => 'Artist', 'image_path' => 'images/people/artist.png'],
                ['category' => 'People', 'word_en' => 'Musician', 'image_path' => 'images/people/musician.png'],

                // Household Items
                ['category' => 'Household Items', 'word_en' => 'Chair', 'image_path' => 'images/household_items/chair.png'],
                ['category' => 'Household Items', 'word_en' => 'Table', 'image_path' => 'images/household_items/table.png'],
                ['category' => 'Household Items', 'word_en' => 'Bed', 'image_path' => 'images/household_items/bed.png'],
                ['category' => 'Household Items', 'word_en' => 'Door', 'image_path' => 'images/household_items/door.png'],
                ['category' => 'Household Items', 'word_en' => 'Window', 'image_path' => 'images/household_items/window.png'],
                ['category' => 'Household Items', 'word_en' => 'Lamp', 'image_path' => 'images/household_items/lamp.png'],
                ['category' => 'Household Items', 'word_en' => 'Sofa', 'image_path' => 'images/household_items/sofa.png'],
                ['category' => 'Household Items', 'word_en' => 'Television', 'image_path' => 'images/household_items/television.png'],
                ['category' => 'Household Items', 'word_en' => 'Cup', 'image_path' => 'images/household_items/cup.png'],
                ['category' => 'Household Items', 'word_en' => 'Plate', 'image_path' => 'images/household_items/plate.png'],
                ['category' => 'Household Items', 'word_en' => 'Fork', 'image_path' => 'images/household_items/fork.png'],
                ['category' => 'Household Items', 'word_en' => 'Spoon', 'image_path' => 'images/household_items/spoon.png'],
                ['category' => 'Household Items', 'word_en' => 'Knife', 'image_path' => 'images/household_items/knife.png'],
                ['category' => 'Household Items', 'word_en' => 'Cabinet', 'image_path' => 'images/household_items/cabinet.png'],
                ['category' => 'Household Items', 'word_en' => 'Mirror', 'image_path' => 'images/household_items/mirror.png'],
                ['category' => 'Household Items', 'word_en' => 'Rug', 'image_path' => 'images/household_items/rug.png'],
                ['category' => 'Household Items', 'word_en' => 'Curtain', 'image_path' => 'images/household_items/curtain.png'],
                ['category' => 'Household Items', 'word_en' => 'Clock', 'image_path' => 'images/household_items/clock.png'],
                ['category' => 'Household Items', 'word_en' => 'Vase', 'image_path' => 'images/household_items/vase.png'],
                ['category' => 'Household Items', 'word_en' => 'Pillow', 'image_path' => 'images/household_items/pillow.png'],
                ['category' => 'Household Items', 'word_en' => 'Blanket', 'image_path' => 'images/household_items/blanket.png'],
                ['category' => 'Household Items', 'word_en' => 'Desk', 'image_path' => 'images/household_items/desk.png'],
                ['category' => 'Household Items', 'word_en' => 'Shelf', 'image_path' => 'images/household_items/shelf.png'],
                ['category' => 'Household Items', 'word_en' => 'Telephone', 'image_path' => 'images/household_items/telephone.png'],

                // Nature
                ['category' => 'Nature', 'word_en' => 'Tree', 'image_path' => 'images/nature/tree.png'],
                ['category' => 'Nature', 'word_en' => 'Flower', 'image_path' => 'images/nature/flower.png'],
                ['category' => 'Nature', 'word_en' => 'River', 'image_path' => 'images/nature/river.png'],
                ['category' => 'Nature', 'word_en' => 'Mountain', 'image_path' => 'images/nature/mountain.png'],
                ['category' => 'Nature', 'word_en' => 'Rain', 'image_path' => 'images/nature/rain.png'],
                ['category' => 'Nature', 'word_en' => 'Snow', 'image_path' => 'images/nature/snow.png'],
                ['category' => 'Nature', 'word_en' => 'Sun', 'image_path' => 'images/nature/sun.png'],
                ['category' => 'Nature', 'word_en' => 'Moon', 'image_path' => 'images/nature/moon.png'],
                ['category' => 'Nature', 'word_en' => 'Star', 'image_path' => 'images/nature/star.png'],
                ['category' => 'Nature', 'word_en' => 'Wind', 'image_path' => 'images/nature/wind.png'],
                ['category' => 'Nature', 'word_en' => 'Cloud', 'image_path' => 'images/nature/cloud.png'],
                ['category' => 'Nature', 'word_en' => 'Lake', 'image_path' => 'images/nature/lake.png'],
                ['category' => 'Nature', 'word_en' => 'Ocean', 'image_path' => 'images/nature/ocean.png'],
                ['category' => 'Nature', 'word_en' => 'Beach', 'image_path' => 'images/nature/beach.png'],
                ['category' => 'Nature', 'word_en' => 'Forest', 'image_path' => 'images/nature/forest.png'],
                ['category' => 'Nature', 'word_en' => 'Desert', 'image_path' => 'images/nature/desert.png'],
                ['category' => 'Nature', 'word_en' => 'Valley', 'image_path' => 'images/nature/valley.png'],
                ['category' => 'Nature', 'word_en' => 'Island', 'image_path' => 'images/nature/island.png'],
                ['category' => 'Nature', 'word_en' => 'Volcano', 'image_path' => 'images/nature/volcano.png'],
                ['category' => 'Nature', 'word_en' => 'Waterfall', 'image_path' => 'images/nature/waterfall.png'],

                // Colors
                ['category' => 'Colors', 'word_en' => 'Red', 'image_path' => 'images/colors/red.png'],
                ['category' => 'Colors', 'word_en' => 'Blue', 'image_path' => 'images/colors/blue.png'],
                ['category' => 'Colors', 'word_en' => 'Green', 'image_path' => 'images/colors/green.png'],
                ['category' => 'Colors', 'word_en' => 'Yellow', 'image_path' => 'images/colors/yellow.png'],
                ['category' => 'Colors', 'word_en' => 'Black', 'image_path' => 'images/colors/black.png'],
                ['category' => 'Colors', 'word_en' => 'White', 'image_path' => 'images/colors/white.png'],
                ['category' => 'Colors', 'word_en' => 'Purple', 'image_path' => 'images/colors/purple.png'],
                ['category' => 'Colors', 'word_en' => 'Orange', 'image_path' => 'images/colors/orange.png'],
                ['category' => 'Colors', 'word_en' => 'Pink', 'image_path' => 'images/colors/pink.png'],
                ['category' => 'Colors', 'word_en' => 'Brown', 'image_path' => 'images/colors/brown.png'],
                ['category' => 'Colors', 'word_en' => 'Gray', 'image_path' => 'images/colors/gray.png'],
                ['category' => 'Colors', 'word_en' => 'Gold', 'image_path' => 'images/colors/gold.png'],
                ['category' => 'Colors', 'word_en' => 'Silver', 'image_path' => 'images/colors/silver.png'],

                // Body Parts
                ['category' => 'Body Parts', 'word_en' => 'Head', 'image_path' => 'images/body_parts/head.png'],
                ['category' => 'Body Parts', 'word_en' => 'Eye', 'image_path' => 'images/body_parts/eye.png'],
                ['category' => 'Body Parts', 'word_en' => 'Ear', 'image_path' => 'images/body_parts/ear.png'],
                ['category' => 'Body Parts', 'word_en' => 'Nose', 'image_path' => 'images/body_parts/nose.png'],
                ['category' => 'Body Parts', 'word_en' => 'Mouth', 'image_path' => 'images/body_parts/mouth.png'],
                ['category' => 'Body Parts', 'word_en' => 'Hand', 'image_path' => 'images/body_parts/hand.png'],
                ['category' => 'Body Parts', 'word_en' => 'Foot', 'image_path' => 'images/body_parts/foot.png'],
                ['category' => 'Body Parts', 'word_en' => 'Leg', 'image_path' => 'images/body_parts/leg.png'],
                ['category' => 'Body Parts', 'word_en' => 'Arm', 'image_path' => 'images/body_parts/arm.png'],
                ['category' => 'Body Parts', 'word_en' => 'Finger', 'image_path' => 'images/body_parts/finger.png'],
                ['category' => 'Body Parts', 'word_en' => 'Hair', 'image_path' => 'images/body_parts/hair.png'],
                ['category' => 'Body Parts', 'word_en' => 'Heart', 'image_path' => 'images/body_parts/heart.png'],
                ['category' => 'Body Parts', 'word_en' => 'Brain', 'image_path' => 'images/body_parts/brain.png'],
                ['category' => 'Body Parts', 'word_en' => 'Back', 'image_path' => 'images/body_parts/back.png'],

                // Vehicles
                ['category' => 'Vehicles', 'word_en' => 'Car', 'image_path' => 'images/vehicles/car.png'],
                ['category' => 'Vehicles', 'word_en' => 'Bus', 'image_path' => 'images/vehicles/bus.png'],
                ['category' => 'Vehicles', 'word_en' => 'Bike', 'image_path' => 'images/vehicles/bike.png'],
                ['category' => 'Vehicles', 'word_en' => 'Train', 'image_path' => 'images/vehicles/train.png'],
                ['category' => 'Vehicles', 'word_en' => 'Airplane', 'image_path' => 'images/vehicles/airplane.png'],
                ['category' => 'Vehicles', 'word_en' => 'Boat', 'image_path' => 'images/vehicles/boat.png'],
                ['category' => 'Vehicles', 'word_en' => 'Truck', 'image_path' => 'images/vehicles/truck.png'],
                ['category' => 'Vehicles', 'word_en' => 'Motorcycle', 'image_path' => 'images/vehicles/motorcycle.png'],
                ['category' => 'Vehicles', 'word_en' => 'Helicopter', 'image_path' => 'images/vehicles/helicopter.png'],

                // School
                ['category' => 'School', 'word_en' => 'Book', 'image_path' => 'images/school/book.png'],
                ['category' => 'School', 'word_en' => 'Pen', 'image_path' => 'images/school/pen.png'],
                ['category' => 'School', 'word_en' => 'Pencil', 'image_path' => 'images/school/pencil.png'],
                ['category' => 'School', 'word_en' => 'Paper', 'image_path' => 'images/school/paper.png'],
                ['category' => 'School', 'word_en' => 'Notebook', 'image_path' => 'images/school/notebook.png'],
                ['category' => 'School', 'word_en' => 'Desk', 'image_path' => 'images/school/desk.png'],
                ['category' => 'School', 'word_en' => 'Teacher', 'image_path' => 'images/school/teacher.png'],
                ['category' => 'School', 'word_en' => 'Student', 'image_path' => 'images/school/student.png'],
                ['category' => 'School', 'word_en' => 'Classroom', 'image_path' => 'images/school/classroom.png'],
                ['category' => 'School', 'word_en' => 'Homework', 'image_path' => 'images/school/homework.png'],

                // Technology
                ['category' => 'Technology', 'word_en' => 'Computer', 'image_path' => 'images/technology/computer.png'],
                ['category' => 'Technology', 'word_en' => 'Phone', 'image_path' => 'images/technology/phone.png'],
                ['category' => 'Technology', 'word_en' => 'Internet', 'image_path' => 'images/technology/internet.png'],
                ['category' => 'Technology', 'word_en' => 'Software', 'image_path' => 'images/technology/software.png'],
                ['category' => 'Technology', 'word_en' => 'Hardware', 'image_path' => 'images/technology/hardware.png'],
                ['category' => 'Technology', 'word_en' => 'Camera', 'image_path' => 'images/technology/camera.png'],
                ['category' => 'Technology', 'word_en' => 'Television', 'image_path' => 'images/technology/television.png'],
                ['category' => 'Technology', 'word_en' => 'Radio', 'image_path' => 'images/technology/radio.png'],
                ['category' => 'Technology', 'word_en' => 'Speaker', 'image_path' => 'images/technology/speaker.png'],
                ['category' => 'Technology', 'word_en' => 'Headphones', 'image_path' => 'images/technology/headphones.png'],
                ['category' => 'Technology', 'word_en' => 'Printer', 'image_path' => 'images/technology/printer.png'],
                ['category' => 'Technology', 'word_en' => 'Keyboard', 'image_path' => 'images/technology/keyboard.png'],
                ['category' => 'Technology', 'word_en' => 'Mouse', 'image_path' => 'images/technology/mouse.png'],
                ['category' => 'Technology', 'word_en' => 'Monitor', 'image_path' => 'images/technology/monitor.png'],
                ['category' => 'Technology', 'word_en' => 'Tablet', 'image_path' => 'images/technology/tablet.png'],

                // Weather
                ['category' => 'Weather', 'word_en' => 'Sunny', 'image_path' => 'images/weather/sunny.png'],
                ['category' => 'Weather', 'word_en' => 'Rainy', 'image_path' => 'images/weather/rainy.png'],
                ['category' => 'Weather', 'word_en' => 'Cloudy', 'image_path' => 'images/weather/cloudy.png'],
                ['category' => 'Weather', 'word_en' => 'Stormy', 'image_path' => 'images/weather/stormy.png'],
                ['category' => 'Weather', 'word_en' => 'Windy', 'image_path' => 'images/weather/windy.png'],
                ['category' => 'Weather', 'word_en' => 'Snowy', 'image_path' => 'images/weather/snowy.png'],
                ['category' => 'Weather', 'word_en' => 'Foggy', 'image_path' => 'images/weather/foggy.png'],
                ['category' => 'Weather', 'word_en' => 'Hot', 'image_path' => 'images/weather/hot.png'],
                ['category' => 'Weather', 'word_en' => 'Cold', 'image_path' => 'images/weather/cold.png'],
                ['category' => 'Weather', 'word_en' => 'Humid', 'image_path' => 'images/weather/humid.png'],

                // Emotions
                ['category' => 'Emotions', 'word_en' => 'Happy', 'image_path' => 'images/emotions/happy.png'],
                ['category' => 'Emotions', 'word_en' => 'Sad', 'image_path' => 'images/emotions/sad.png'],
                ['category' => 'Emotions', 'word_en' => 'Angry', 'image_path' => 'images/emotions/angry.png'],
                ['category' => 'Emotions', 'word_en' => 'Scared', 'image_path' => 'images/emotions/scared.png'],
                ['category' => 'Emotions', 'word_en' => 'Excited', 'image_path' => 'images/emotions/excited.png'],
                ['category' => 'Emotions', 'word_en' => 'Tired', 'image_path' => 'images/emotions/tired.png'],
                ['category' => 'Emotions', 'word_en' => 'Bored', 'image_path' => 'images/emotions/bored.png'],
                ['category' => 'Emotions', 'word_en' => 'Nervous', 'image_path' => 'images/emotions/nervous.png'],
                ['category' => 'Emotions', 'word_en' => 'Surprised', 'image_path' => 'images/emotions/surprised.png'],
                ['category' => 'Emotions', 'word_en' => 'Confused', 'image_path' => 'images/emotions/confused.png'],

                // Occupations
                ['category' => 'Occupations', 'word_en' => 'Doctor', 'image_path' => 'images/occupations/doctor.png'],
                ['category' => 'Occupations', 'word_en' => 'Nurse', 'image_path' => 'images/occupations/nurse.png'],
                ['category' => 'Occupations', 'word_en' => 'Teacher', 'image_path' => 'images/occupations/teacher.png'],
                ['category' => 'Occupations', 'word_en' => 'Engineer', 'image_path' => 'images/occupations/engineer.png'],
                ['category' => 'Occupations', 'word_en' => 'Farmer', 'image_path' => 'images/occupations/farmer.png'],
                ['category' => 'Occupations', 'word_en' => 'Driver', 'image_path' => 'images/occupations/driver.png'],
                ['category' => 'Occupations', 'word_en' => 'Chef', 'image_path' => 'images/occupations/chef.png'],
                ['category' => 'Occupations', 'word_en' => 'Police', 'image_path' => 'images/occupations/police.png'],
                ['category' => 'Occupations', 'word_en' => 'Firefighter', 'image_path' => 'images/occupations/firefighter.png'],
                ['category' => 'Occupations', 'word_en' => 'Pilot', 'image_path' => 'images/occupations/pilot.png'],

                // Tools
                ['category' => 'Tools', 'word_en' => 'Hammer', 'image_path' => 'images/tools/hammer.png'],
                ['category' => 'Tools', 'word_en' => 'Screwdriver', 'image_path' => 'images/tools/screwdriver.png'],
                ['category' => 'Tools', 'word_en' => 'Wrench', 'image_path' => 'images/tools/wrench.png'],
                ['category' => 'Tools', 'word_en' => 'Drill', 'image_path' => 'images/tools/drill.png'],
                ['category' => 'Tools', 'word_en' => 'Saw', 'image_path' => 'images/tools/saw.png'],
                ['category' => 'Tools', 'word_en' => 'Tape measure', 'image_path' => 'images/tools/tape_measure.png'],
                ['category' => 'Tools', 'word_en' => 'Ladder', 'image_path' => 'images/tools/ladder.png'],
                ['category' => 'Tools', 'word_en' => 'Nails', 'image_path' => 'images/tools/nails.png'],
                ['category' => 'Tools', 'word_en' => 'Screws', 'image_path' => 'images/tools/screws.png'],
                ['category' => 'Tools', 'word_en' => 'Pliers', 'image_path' => 'images/tools/pliers.png'],

                // Travel
                ['category' => 'Travel', 'word_en' => 'Airport', 'image_path' => 'images/travel/airport.png'],
                ['category' => 'Travel', 'word_en' => 'Hotel', 'image_path' => 'images/travel/hotel.png'],
                ['category' => 'Travel', 'word_en' => 'Passport', 'image_path' => 'images/travel/passport.png'],
                ['category' => 'Travel', 'word_en' => 'Ticket', 'image_path' => 'images/travel/ticket.png'],
                ['category' => 'Travel', 'word_en' => 'Luggage', 'image_path' => 'images/travel/luggage.png'],
                ['category' => 'Travel', 'word_en' => 'Map', 'image_path' => 'images/travel/map.png'],
                ['category' => 'Travel', 'word_en' => 'Bus station', 'image_path' => 'images/travel/bus_station.png'],
                ['category' => 'Travel', 'word_en' => 'Train station', 'image_path' => 'images/travel/train_station.png'],
                ['category' => 'Travel', 'word_en' => 'Taxi', 'image_path' => 'images/travel/taxi.png'],
                ['category' => 'Travel', 'word_en' => 'Beach', 'image_path' => 'images/travel/beach.png'],

                //Clothing
                ['category' => 'Clothing', 'word_en' => 'Shirt', 'image_path' => 'images/clothing/shirt.png'],
                ['category' => 'Clothing', 'word_en' => 'Pants', 'image_path' => 'images/clothing/pants.png'],
                ['category' => 'Clothing', 'word_en' => 'Dress', 'image_path' => 'images/clothing/dress.png'],
                ['category' => 'Clothing', 'word_en' => 'Hat', 'image_path' => 'images/clothing/hat.png'],
                ['category' => 'Clothing', 'word_en' => 'Shoes', 'image_path' => 'images/clothing/shoes.png'],
                ['category' => 'Clothing', 'word_en' => 'Jacket', 'image_path' => 'images/clothing/jacket.png'],
                ['category' => 'Clothing', 'word_en' => 'Skirt', 'image_path' => 'images/clothing/skirt.png'],
                ['category' => 'Clothing', 'word_en' => 'Socks', 'image_path' => 'images/clothing/socks.png'],
                ['category' => 'Clothing', 'word_en' => 'Belt', 'image_path' => 'images/clothing/belt.png'],
                ['category' => 'Clothing', 'word_en' => 'Gloves', 'image_path' => 'images/clothing/gloves.png'],


                // Time
                ['category' => 'Time', 'word_en' => 'Day', 'image_path' => 'images/time/day.png'],
                ['category' => 'Time', 'word_en' => 'Night', 'image_path' => 'images/time/night.png'],
                ['category' => 'Time', 'word_en' => 'Hour', 'image_path' => 'images/time/hour.png'],
                ['category' => 'Time', 'word_en' => 'Minute', 'image_path' => 'images/time/minute.png'],
                ['category' => 'Time', 'word_en' => 'Second', 'image_path' => 'images/time/second.png'],
                ['category' => 'Time', 'word_en' => 'Week', 'image_path' => 'images/time/week.png'],
                ['category' => 'Time', 'word_en' => 'Month', 'image_path' => 'images/time/month.png'],
                ['category' => 'Time', 'word_en' => 'Year', 'image_path' => 'images/time/year.png'],
                ['category' => 'Time', 'word_en' => 'Morning', 'image_path' => 'images/time/morning.png'],
                ['category' => 'Time', 'word_en' => 'Evening', 'image_path' => 'images/time/evening.png'],

                // Music
                ['category' => 'Music', 'word_en' => 'Song', 'image_path' => 'images/music/song.png'],
                ['category' => 'Music', 'word_en' => 'Dance', 'image_path' => 'images/music/dance.png'],
                ['category' => 'Music', 'word_en' => 'Guitar', 'image_path' => 'images/music/guitar.png'],
                ['category' => 'Music', 'word_en' => 'Piano', 'image_path' => 'images/music/piano.png'],
                ['category' => 'Music', 'word_en' => 'Drum', 'image_path' => 'images/music/drum.png'],
                ['category' => 'Music', 'word_en' => 'Singing', 'image_path' => 'images/music/singing.png'],
                ['category' => 'Music', 'word_en' => 'Band', 'image_path' => 'images/music/band.png'],
                ['category' => 'Music', 'word_en' => 'Concert', 'image_path' => 'images/music/concert.png'],
                ['category' => 'Music', 'word_en' => 'Melody', 'image_path' => 'images/music/melody.png'],
                ['category' => 'Music', 'word_en' => 'Rhythm', 'image_path' => 'images/music/rhythm.png'],

                // Numbers (1–10)
                ['category' => 'Numbers', 'word_en' => 'One',    'image_path' => 'images/numbers/1.png'],
                ['category' => 'Numbers', 'word_en' => 'Two',    'image_path' => 'images/numbers/2.png'],
                ['category' => 'Numbers', 'word_en' => 'Three',  'image_path' => 'images/numbers/3.png'],
                ['category' => 'Numbers', 'word_en' => 'Four',   'image_path' => 'images/numbers/4.png'],
                ['category' => 'Numbers', 'word_en' => 'Five',   'image_path' => 'images/numbers/5.png'],
                ['category' => 'Numbers', 'word_en' => 'Six',    'image_path' => 'images/numbers/6.png'],
                ['category' => 'Numbers', 'word_en' => 'Seven',  'image_path' => 'images/numbers/7.png'],
                ['category' => 'Numbers', 'word_en' => 'Eight',  'image_path' => 'images/numbers/8.png'],
                ['category' => 'Numbers', 'word_en' => 'Nine',   'image_path' => 'images/numbers/9.png'],
                ['category' => 'Numbers', 'word_en' => 'Ten',    'image_path' => 'images/numbers/10.png'],
                ['category' => 'Numbers', 'word_en' => 'Twenty',      'image_path' => 'images/numbers/20.png'],
                ['category' => 'Numbers', 'word_en' => 'Thirty',      'image_path' => 'images/numbers/30.png'],
                ['category' => 'Numbers', 'word_en' => 'Forty',       'image_path' => 'images/numbers/40.png'],
                ['category' => 'Numbers', 'word_en' => 'Fifty',       'image_path' => 'images/numbers/50.png'],
                ['category' => 'Numbers', 'word_en' => 'Sixty',       'image_path' => 'images/numbers/60.png'],
                ['category' => 'Numbers', 'word_en' => 'Seventy',     'image_path' => 'images/numbers/70.png'],
                ['category' => 'Numbers', 'word_en' => 'Eighty',      'image_path' => 'images/numbers/80.png'],
                ['category' => 'Numbers', 'word_en' => 'Ninety',      'image_path' => 'images/numbers/90.png'],
                ['category' => 'Numbers', 'word_en' => 'One Hundred', 'image_path' => 'images/numbers/100.png'],
                ['category' => 'Numbers', 'word_en' => 'Two Hundred',   'image_path' => 'images/numbers/200.png'],
                ['category' => 'Numbers', 'word_en' => 'Three Hundred', 'image_path' => 'images/numbers/300.png'],
                ['category' => 'Numbers', 'word_en' => 'Four Hundred',  'image_path' => 'images/numbers/400.png'],
                ['category' => 'Numbers', 'word_en' => 'Five Hundred',  'image_path' => 'images/numbers/500.png'],
                ['category' => 'Numbers', 'word_en' => 'Six Hundred',   'image_path' => 'images/numbers/600.png'],
                ['category' => 'Numbers', 'word_en' => 'Seven Hundred', 'image_path' => 'images/numbers/700.png'],
                ['category' => 'Numbers', 'word_en' => 'Eight Hundred', 'image_path' => 'images/numbers/800.png'],
                ['category' => 'Numbers', 'word_en' => 'Nine Hundred',  'image_path' => 'images/numbers/900.png'],
                ['category' => 'Numbers', 'word_en' => 'One Thousand',  'image_path' => 'images/numbers/1000.png'],
                ['category' => 'Numbers', 'word_en' => 'One Hundred Thousand',  'image_path' => 'images/numbers/100000.png'],
                ['category' => 'Numbers', 'word_en' => 'Five Hundred Thousand', 'image_path' => 'images/numbers/500000.png'],
                ['category' => 'Numbers', 'word_en' => 'One Million',           'image_path' => 'images/numbers/1000000.png'],

        ];


        foreach ($entries as $entry) {
            if (!isset($categories[$entry['category']])) {
                $this->command->error("Category {$entry['category']} not found!");
                continue;
            }

            $baseSlug = Str::slug($entry['word_en']);
            $slug = $baseSlug;

            // Append category slug if there's a conflict
            if (DictionaryMainEntry::where('slug_en', $slug)->exists()) {
                $slug = $baseSlug . '-' . Str::slug($entry['category']);
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
                ]
            );
        }
    }
}
