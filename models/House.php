<?php

include $_INNER_PATH . "./models/DB.php";

class House
{
	public $id;
	public $address;
	public $roomCount;
	public $isHouse;
	public $floor;
	public $image;

	public function __construct($id = null, $address = null, $roomCount = null, $isHouse = 0, $floor = null, $image = null)
	{
		$this->id = $id;
		$this->address = $address;
		$this->roomCount = $roomCount;
		$this->isHouse = $isHouse;
		$this->floor = $floor;
		$this->image = $image;
	}

	public static function all()
	{
		$houses = [];
		$db = new DB();
		$query = "SELECT * from `house`";
		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$houses[] = new House($row['id'], $row['address'], $row['room_count'], $row['is_house'], $row['floor'], $row['image']);
		}
		$db->conn->close();
		// print_r($houses);die;
		return $houses;
	}

	public static function create()
	{
		$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/namainamuciai";
		// print_r($_FILES);die;
		$db = new DB();
		$filename = $_FILES["image"]["name"];
		$tempname = $_FILES["image"]["tmp_name"];
		$folder = $_INNER_PATH . "/images/" . $filename;
		$stmt = $db->conn->prepare("INSERT INTO `house`( `address`, `room_count`, `is_house`,`floor`, `image`) VALUES (?,?,?,?,?)");
		$stmt->bind_param("siiis", $_POST['address'], $_POST['roomCount'], $_POST['isHouse'], $_POST['floor'], $filename);
		if (move_uploaded_file($tempname, $folder)) {
			echo "<h3>  Image uploaded successfully!</h3>";
		} else {
			echo "<h3>  Failed to upload image!</h3>";
		}
		$stmt->execute();
		$stmt->close();
		$db->conn->close();
		// }
	}

	public static function find($id)
	{
		$house = new House();
		$db = new DB();
		$query = "SELECT * FROM `house` where `id`=" . $id;
		$result = $db->conn->query($query);
		// print_r($_GET);
		while ($row = $result->fetch_assoc()) {
			$house = new House($row['id'], $row['address'], $row['room_count'], $row['is_house'], $row['floor'], $row['image']);
		}
		$db->conn->close();
		return $house;
	}

	public function update()
	{
		$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/namainamuciai";
		$filename = $_FILES["image"]["name"];
		$tempname = $_FILES["image"]["tmp_name"];
		$folder = $_INNER_PATH . "/images/" . $filename;
		$db = new DB();
		$stmt = $db->conn->prepare("UPDATE `house` SET `address`= ? ,`room_count`= ? ,`is_house`= ? , `floor`= ?, `image`= ? WHERE `id` = ?");
		$stmt->bind_param("siiisi", $_POST['address'], $_POST['roomCount'], $_POST['isHouse'], $_POST['floor'], $filename, $_POST['id']);
		$stmt->execute();
		if (move_uploaded_file($tempname, $folder)) {
			echo "<h3>  Image uploaded successfully!</h3>";
		} else {
			echo "<h3>  Failed to upload image!</h3>";
		}
		$stmt->close();
		$db->conn->close();
	}

	public static function destroy()
	{
		$db = new DB();
		$stmt = $db->conn->prepare("DELETE FROM `house` WHERE `id` = ?");
		$stmt->bind_param("i", $_POST['id']);
		$stmt->execute();

		$stmt->close();
		$db->conn->close();
	}

	public static function search()
	{
		$houses = [];
		$db = new DB();
		$query = "SELECT * FROM `house` WHERE `address` LIKE \"%" . $_GET['search'] . "%\"";
		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$houses[] = new House($row['id'], $row['address'], $row['room_count'], $row['is_house'], $row['floor'], $row['image']);
		}
		$db->conn->close();
		return $houses;
	}

	public static function filter()
	{
		// print_r($_GET);die;
		$houses = [];
		$db = new DB();
		$query = "SELECT * FROM `house` ";
		$first = true;
		if (!isset($_GET['address'])) {
			$query .= "";
		} else if (($_GET['address'] != "")) {
			$first = false;
			$query .= "WHERE `address` LIKE  \"%" . $_GET['address'] . "%\"" . " ";
		}

		if ($_GET['from'] != "") {
			$query .= (($first) ? "WHERE" : "AND") . " `room_count` >= " . $_GET['from'] . " ";
			$first = false;
		}
		if ($_GET['to'] != "") {
			$query .= (($first) ? "WHERE" : "AND") . " `room_count` <= " . $_GET['to'] . " ";
			$first = false;
		}
		if ($_GET['fromfloor'] != "") {
			$query .= (($first) ? "WHERE" : "AND") . " `floor` >= " . $_GET['fromfloor'] . " ";
			$first = false;
		}
		if ($_GET['tofloor'] != "") {
			$query .= (($first) ? "WHERE" : "AND") . " `floor` <= " . $_GET['tofloor'] . " ";
			$first = false;
		}
		if (!isset($_GET['type'])) {
			$query .= "";

		} else {
			switch ($_GET['type']) {

				case '1':
					$query .= (($first) ? "WHERE" : "AND") . " `is_house` = 0" . " ";
					$first = false;
					break;
				case '2':
					$query .= (($first) ? "WHERE" : "AND") . " `is_house` = 1" . " ";
					$first = false;
					break;
			}
		}

		if (!isset($_GET['sort'])) {
			$query .= "";
		} else {

			switch ($_GET['sort']) {

				case '1':
					$query .= "ORDER BY `room_count`";
					break;

				case '2':
					$query .= "ORDER BY `room_count` DESC";
					break;

				case '3':
					$query .= "ORDER BY `address`";
					break;

				case '4':
					$query .= "ORDER BY `address` DESC";
					break;
			}
		}
		// print_r($_GET);
		// print_r($query);die;
		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$houses[] = new House($row['id'], $row['address'], $row['room_count'], $row['is_house'], $row['floor'], $row['image']);
		}
		$db->conn->close();
		return $houses;
	}

// }

}
