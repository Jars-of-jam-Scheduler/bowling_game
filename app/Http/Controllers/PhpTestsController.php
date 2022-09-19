<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessClasses\VehiclesProject\Peugeot;

class PhpTestsController extends Controller
{
    public function startAllTests() : void  // Return type
	{
		$this->testVehiclesProject();
	}

	private function testVehiclesProject() : void
	{
		$peugeot = new Peugeot(
			brand_name: 'Peugeot R4'  // Parameters names
		);

		echo '<pre>';
		var_dump($peugeot->drive(), $peugeot->getBrandName(), $peugeot->open(), $peugeot->useTraitMethod());
		echo '</pre>';
	}
}
