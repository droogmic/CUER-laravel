<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Task;
use App\InvItem, App\InvType, App\Location;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // Eloquent::unguard();

        // call our class and run our seeds
        $this->call('CuerAppSeeder');
        $this->command->info('Bear app seeds finished.'); // show information in the command line after everything is run
        
        // Eloquent::guard();
    }
}

// our own seeder class
// usually this would be its own file
class CuerAppSeeder extends Seeder {
    
    public function run() {

        // clear our database ------------------------------------------
        DB::table('inv_items')->delete();
        DB::table('inv_types')->delete();
        DB::table('locations')->delete();
        DB::table('tasks')->delete();
        DB::table('users')->delete();

        // seed our users table -----------------------
        // we'll create three different users

        // user 0 is named Xiaofan
        $userRes = User::create(array(
            'id'        => 1,
            'name'      => 'Xiaofan',
            'email'     => 'xz353@cam.ac.uk',
            'password'  => 'iamapenis',
        ));

        // user 1 is named Resolution. She is extremely dangerous. Especially when rolling by.
        $userRes = User::create(array(
            'name'      => 'Resolution',
            'email'     => 'res@cuer.co.uk',
            'password'  => 'rollcage',
        ));

        // user 2 is named Evolution. She has a loud growl but is pretty much harmless without tracking.
        $userEvo = User::create(array(
            'name'      => 'Evolution',
            'email'     => 'evo@cuer.co.uk',
            'password'  => 'gorillatape',
        ));

        // user 3 is named Genevieve. She is a power user. She drinks wine.
        $userGen = User::create(array(
            'name'      => 'Genevieve',
            'email'     => 'gen@cuer.co.uk',
            'password'  => 'nextgen',
        ));
        $this->command->info('The users are alive!');

        // seed our invType table ---------------------
        $typeCar = invType::create(array(
            'name'          => 'GenCar',
            'description'   => 'Designed by gods',
            'mass'          =>  160.2,
        ));
        $typeEgo = invType::create(array(
            'name'          => 'GenEgo',
            'description'   => 'Brighter than the australian sun',
            'mass'          => 40000,
        ));
        $this->command->info('Inventory types!');

        // seed our invItem table ------------------------

        $itemRes = invItem::create(array(
            'type_id'       => $typeEgo->id,
            'updated_by'    => $userRes->id,
            'reference'     => 'cats n shit'
        ));
        $itemEvo = invItem::create(array(
            'type_id'       => $typeCar->id,
            'updated_by'    => $userEvo->id,
            'reference'     => 'a'
        ));
        $itemGen = invItem::create(array(
            'type_id'       => $typeEgo->id,
            'updated_by'    => $userGen->id,
            'reference'     => NULL
        ));
        
        $this->command->info('Cars be built!');

        // seed our locations table ---------------------

        // we will create one picnic and apply all users to this one picnic
        $locationMarshall = Location::create(array(
            'name'        => 'Marshall',
            'description' => 'A land far far away',
        ));
        $locationCUED = Location::create(array(
            'name'        => 'CUED',
            'description' => 'A blue place',
        ));

        $this->command->info('They are terrorizing picnics!');

    }

}
