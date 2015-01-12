<?php namespace App\Http\Controllers;

class StatsController extends Controller {

	public function getIndex()
	{
		$mem = $this->getMemory();
		$cpu = $this->getCPU();

		return Response::json([
			'mem' => $mem,
			'cpu' => $cpu,
			'avg' => (($mem + $cpu) / 2)
			]);
	}

	private function getMemory()
	{
		$free = shell_exec('free');
		$free = (string)trim($free);
		$free_arr = explode("\n", $free);
		$mem = explode(" ", $free_arr[1]);
		$mem = array_filter($mem);
		$mem = array_merge($mem);
		$memory_usage = $mem[2]/$mem[1]*100;

		return $memory_usage;
	}

	private function getCPU()
	{
		$load = sys_getloadavg();
		return $load[0];
	}

}
