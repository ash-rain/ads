<?php
use Illuminate\Database\Seeder;
use App\Access;
use App\AdUnit;
use App\Publisher;

class DataSeeder extends Seeder
{

    public function run()
    {
        $p = Publisher::create([
            'email' => 'boyan.balkanski@gmail.com',
            'client_id' => 5446225780967117
        ]);
        
        $adunits = array([
        	'width'	=> 336,
        	'height'	=> 280,
        	'slot'	=> 2675113902
        ],[
        	'width'	=> 728,
        	'height'	=> 90,
        	'slot'	=> 4151847105
        ]);

        foreach ($adunits as $id => $adunit)
        {
            $adunit['id'] = $id + 1;
            $adunit['publisher_id'] = $p->id;
            $a = AdUnit::create($adunit);
            Access::create([ 'ad_unit_id'=>$a->id, 'domain'=>'ads.dev' ]);
        }
    }

}
