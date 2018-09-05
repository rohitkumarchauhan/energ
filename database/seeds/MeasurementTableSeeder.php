<?php

use Illuminate\Database\Seeder;

class MeasurementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $keys = [
            'title',
            'image_gif',
            'image_png',
            'image_jpg',
            'type',
            'status',
            'created_at',
            'updated_at',
            'description'
        ];


        $values = [
            /**    BodyType   **/
            ['Sloping Shoulders Long Neck', '1-28.gif', 'Sloping_Shoulders_Long_Neck.png', 'Sloping_Shoulders_Long_Neck.jpg', '1', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Square Shoulders Short Neck', '1-29.gif', 'Sloping_Shoulders_Short_Neck.png', 'Sloping_Shoulders_Short_Neck.jpg', '1', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Square Shoulders Normal Neck', '1-30.gif', 'Sloping_Shoulders_Normal_Neck.png', 'Sloping_Shoulders_Normal_Neck.jpg', '1', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Erect Full Chest', '1-31.gif', 'ErectFull_Chest.png', 'ErectFull_Chest.jpg', '1', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Forward Neck', '1-32.gif', 'Forward_Neck.png', 'Forward_Neck.jpg', '1', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Normal Posture', '1-33.gif', 'Normal_Posture.png', 'Normal_Posture.jpg', '1', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Round Back', '1-34.gif', 'Round_Back.png', 'Round_Back.jpg', '1', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Forward Stomach Stout', '35.gif', 'Forward_StomachStout.png', 'Forward_StomachStout.jpg', '1', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],

            /**   Measurement   **/


            ['Neck', '1-1.gif', 'Neck.png', 'Neck.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42','Please Measure around neck where collar usually sits.Measure around your bare neck.Take a loose measurement at this point for a comfortable fit allow room for one index finger between the tape and the neck'],
            ['Overarm', '1-2.gif', 'Overarm.png', 'Overarm.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42','With arms relaxed down at sides measure around your chest including fullest part of your arms at the highest point of the shoulder blade keeping tape parallel to the floor.Hold the tape sufficiently and easy allow room from one index finger between the tape and body'],
            ['Chest', '1-3.gif', 'Chest.png', 'Chest.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42','Chest measure around fullest part of your chest(usually at the nipples ).Hold the tape sufficiently easy allow room for one index finger between the tape and the body.Keeping tape up attempt and make sure that it is centered well over shoulder blades in back and over fullest part of breast in front'],
            ['Stomach', '1-4.gif', 'Stomach.png', 'Stomach.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42','Measure around your body where your belly is.Hold the tape sufficiently easy-allow room for one index finger between the body and tape.Thin people measure at the thinnest point and large people at their widest'],
            ['Front', '1-5.gif', 'Front.png', 'Front.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42','Measure your body one armhole to other armhole in front'],
            ['Back', '1-6.gif', 'Back.png', 'Back.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42','Measure your body one armhole to other armhole at back'],
            ['Shoulder to Shoulder', '1-7.gif', 'Shoulder_to_Shoulder.png', 'Shoulder_to_Shoulder.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42','Measure your body from end of one shoulder to other end of shoulder(place the tape at the end of shoulder bone where the arms are connected.)'],
            ['WristCuff', '1-8.gif', 'WristCuff.png', 'WristCuff.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42','Measure around the fullest part of the wrist.Hold the tape sufficiently easy allow room for one index finger between the tape and the body.Take the measure around your bare wrist not over your shirt'],
            ['Collar', '1-8.gif', 'Collar.png', 'Collar.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42','Open and turn up shirt collars.Place tape around your collars button to far end of button hole.(FIT TIP- Another way is to use a shirt with well fitting collars.Lay the collars out flat and measure from one center of collar button to far end of buttonhole )'],
            ['WristCuff', '1-9.gif', 'WristCuff.png', 'WristCuff.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',''],
            ['Width_of_Shirt_Shoulder', '1-10.gif', 'Width_of_Shirt_Shoulder.png', 'Width_of_Shirt_Shoulder.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42','With your shirt on measure from the back at the end of one shoulder seam to the end of other shoulder seam'],
            ['Shirt Length', '1-11.gif', 'Shirt_Length.png', 'Shirt_Length.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42','Measure,at back from center of lower colllars of seam to length desired.The Figure include tail length so be careful to mesure all the way down to below the hips.(FIT TIP-The shirt tail should be a long enough to completely cover the buttocks)'],
            ['Shirt Sleeve', '1-12.gif', 'Shirt_Sleeve.png', 'Shirt_Sleeve.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42','Measure sleeve from shoulder seam down to the palm of the hand(FIT TIP-The Sleeve must be long enough to fit well even when the arm is bent and not just when hand is hanging down vertically.Otherwise recedes far behind the wrist if you bent or lift your arm )'],
            ['Trousers Waist', '1-13.gif', 'Trousers_Waist.png', 'Trousers_Waist.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Hips', '1-14.gif', 'Hips.png', 'Hips.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Rise', '1-15.gif', 'Rise.png', 'Rise.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42','Measure from the top of waistband in the front,passing tape through your legs and pulling comfortable at the crotch to top of waistband in the back .Total measurment is your rise'],
            ['Trousers Length', '1-16.gif', 'Trousers_Length.png', 'Trousers_Length.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42','Have standard dress shoes on at this step,and adjust trouser to waist position you normally wear trousers.At your side start tape from top of waistband and measure down to where you want trouser to fall or break.Remember to measure to the bottom of the desired .even you intend to have cuffs if you are not wearing shoes than measure to the floor'],
            ['Inseam', '1-17.gif', 'Inseam.png', 'Inseam.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Knee-Length', '1-18.gif', 'Knee-Length.png', 'Knee-Length.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Trousers-Thigh-Width', '1-19.gif', 'Trousers-Thigh-Width.png', 'Trousers-Thigh-Width.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Trousers-Knee-Width', '1-20.gif', 'Trousers-Knee-Width.png', 'Trousers-Knee-Width.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Trousers-Bottom-Width', '1-21.gif', 'Trousers-Bottom-Width.png', 'Trousers-Bottom-Width.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Width of Jacket Shoulder', '1-22.gif', 'Width-of-Jacket-Shoulder.png', 'Width-of-Jacket-Shoulder.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Jacket Back', '1-23.gif', 'Jacket_Back.png', 'Jacket_Back.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Jacket Length', '1-24.gif', 'Jacket_Length.png', 'Jacket_Length.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Front Jacket Length', '1-25.gif', 'Front_Jacket_Length.png', 'Front_Jacket_Length.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Half Shoulders', '1-26.gif', 'Half_Shoulders.png', 'Half_Shoulders.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],
            ['Coat Sleeve', '1-27.gif', 'Coat_Sleeve.png', 'Coat_Sleeve.jpg', '2', 1, '2018-04-19 06:04:42', '2018-04-19 06:04:42',NULL],

        ];

        $insert_array = [];
        foreach ($values as $value) {
            $insert_array[] = array_combine($keys, $value);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\MeasurementOption::query()->truncate();
        //   print_r($insert_array);exit;
        DB::table('measurement_options')->insert($insert_array);
        //  \App\Http\Models\Permission::create($insert_array);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
