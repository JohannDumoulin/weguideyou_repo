<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertCourse extends Model
{
    protected $type;
	protected $title;
	protected $description;
	protected $nb_pers;
	protected $profession;
	protected $dateStart;
	protected $dateEnd;
	protected $duration;
	protected $price;
	protected $displayNumber;
	protected $activities;
	protected $locations;

	public function __construct($type, $title, $description, $nb_pers, $profession, $dateStart, $dateEnd, $duration, $price, $displayNumber, $activities, $locations)
    {
        $this->type = $type;
        $this->title = $title;
        $this->description = $description;
        $this->nb_pers = $nb_pers;
        $this->profession = $profession;
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
        $this->duration = $duration;
        $this->price = $price;
        $this->displayNumber = $displayNumber;
        $this->activities = $activities;
        $this->locations = $locations;
    }
}
