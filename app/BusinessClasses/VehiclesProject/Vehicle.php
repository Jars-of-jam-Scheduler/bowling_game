<?php
namespace App\BusinessClasses\VehiclesProject;

use App\BusinessInterfaces\VehiclesProject\OpenableVehicle;

abstract class Vehicle implements OpenableVehicle
{
	protected final const REF = "RX";  // final class constant = not overridable by children classes
	protected const NUMBER_OF_WHEELS = 4;

	use \App\BusinessTraits\VehiclesProject\ATrait, \App\BusinessTraits\VehiclesProject\BTrait {
		\App\BusinessTraits\VehiclesProject\ATrait::traitMethod insteadof \App\BusinessTraits\VehiclesProject\BTrait;
		\App\BusinessTraits\VehiclesProject\BTrait::traitMethod as traitMethodOfB;
	}  // Traits have same method name => use of AS and INSTEADOF keywords

	public function __construct(protected string $brand_name)  // Constructor promotion
	{}

	public function drive(): string
	{
		return 'Driving';
	}

	abstract public function getBrandName(): string;  // abstract function of abstract class = must be implemented in children

}