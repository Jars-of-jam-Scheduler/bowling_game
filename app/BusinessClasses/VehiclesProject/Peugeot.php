<?php
namespace App\BusinessClasses\VehiclesProject;

class Peugeot extends Vehicle
{
	protected const NUMBER_OF_WHEELS = "XX";  // This const can be overriden

	public function getBrandName() : string // Implementing the parent abstract method 
	{
		$driving_intensity = match ($this->brand_name) {  // Match control structure
			'Peugeot R4' => 'très bien'
		};

		return 'Je roule ' . $driving_intensity . ' dans une voiture de marque ' . $this->brand_name . ' (' . Peugeot::REF . ').';
	}

	public function open() : string  // Implementing interface's method
	{
		return 'Portière ouverte';
	}

	public function useTraitMethod() : string
	{
		return $this->traitMethod() . ' # ' . $this->traitMethodOfB();
	}

}