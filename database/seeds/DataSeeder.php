<?php
use Illuminate\Database\Seeder;
use App\Access;
use App\AdUnit;
use App\Publisher;

class DataSeeder extends Seeder
{

    public function run()
    {
        DB::table('publishers')->delete();
		$p = Publisher::create([
            'name' => 'boyan.balkanski@gmail.com',
            'client' => 5446225780967117
        ]);


        DB::table('ad_units')->delete();
        DB::table('access')->delete();

        $adunits = array([
			'width'		=> 300,
			'height'	=> 600,
			'slot'		=> 3538875107
		],[
			'width'		=> 320,
			'height'	=> 100,
			'slot'		=> 1047910302
		]);

        foreach ($adunits as $id => $adunit)
        {
            $adunit['id'] = $id + 1;
        	$adunit['publisher_id'] = $p->id;
        	$a = AdUnit::create($adunit);
            Access::create([ 'ad_id'=>$a->id, 'domain'=>'microads.dev' ]);
        }
    }

}
