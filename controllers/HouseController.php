<?php
include $_INNER_PATH . "./models/House.php";

class HouseController
{

	public static function index()
	{
		$houses = House::all();
		return $houses;
	}

	public static function store()
	{
		House::create();
	}

	public static function show()
	{
		$car = House::find($_GET['id']);
		return $car;
	}

	public static function update()
	{
		$house = new House();
		$house->id = $_POST['id'];
		$house->year = $_POST['address'];
		$house->model = $_POST['roomCount'];
		$house->about = $_POST['isHouse'];
		$house->price = $_POST['floor'];
		$house->image = $_FILES["image"]["name"];

		$house->update();
	}

	public static function destroy()
	{
		House::destroy($_POST['id']);
	}

	public static function filter()
	{
		$houses = House::filter();
		return $houses;
	}
	public static function search()
	{
		$houses = House::search();
		return $houses;
	}

}
