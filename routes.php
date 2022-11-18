<?php
// include "./components/head.php";
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/namainamuciai";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/namainamuciai";
include $_INNER_PATH . "/controllers/HouseController.php";

$edit = false;

// $cars = HouseController::index();
// $carBrands = CarsBrandController::index();
// if (isset($_GET['search'])) {
// 	$cars = CarsController::search();
// }

// if (isset($_GET['filter']) || isset($_GET['from']) || isset($_GET['to']) || isset($_GET['sort'])) {
// 	$cars = CarsController::filter();
// }

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['save'])) {
		print_r($_POST['save']);
		HouseController::store();
		header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/namainamuciai/index.php");
		die;

		print_r($_POST);
	}
	if (isset($_POST['edit'])) {

		$house = HouseController::show();
		$edit = true;
	}

	if (isset($_POST['update'])) {

		HouseController::update();
		header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/namainamuciai/index.php");
		die;
	}

	if (isset($_POST['destroy'])) {
		HouseController::destroy();
		header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/namainamuciai/index.php");
		die;
	}

}
if ($_SERVER['REQUEST_METHOD'] == "GET") {
	$houses = HouseController::index();

	if (isset($_GET['filter']) || isset($_GET['from']) || isset($_GET['to']) || isset($_GET['sort'])) {
		$houses = HouseController::filter();
	}

	if (isset($_GET['edit'])) {
		$house = HouseController::show($_GET['id']);
	}
	// if (isset($_GET['search'])) {
	// 	$items = HouseController::search();

	if (count($_GET) == 0) {
		$houses = HouseController::index();
	}

	if (isset($_GET['show'])) {
		$house = HouseController::show($_GET['id']);
	}
	if (isset($_GET['search'])) {
		$houses = HouseController::search();

	}

}
