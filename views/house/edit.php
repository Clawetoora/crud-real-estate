<?php
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/namainamuciai";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/namainamuciai";
include "$_INNER_PATH/components/head.php";
include $_INNER_PATH . "/routes.php";

$old = false;
if (isset($_SESSION['POST'])) {
	if (count($_SESSION['POST']) != 0) {
		$old = true;
	}
}
?>
<div class="form-container">

<form class=" mt-3 login-form"id="forma" action="" method="post"  name="update" enctype="multipart/form-data" >
    <div class="login-form form-group">
        <label for="f2">Address</label>
        <input type="text"name="address" id="f2" class="form-control" value="<?=($old) ? $_SESSION['POST']['address'] : $house->address?>" placeholder="eg. street, suite, flat number, city">
    </div>

    <div class="form-group">
        <label for="f2">Room count</label>
        <input type="number" name="roomCount" id="f2" class="form-control" value="<?=($old) ? $_SESSION['POST']['roomCount'] : $house->roomCount?>" placeholder="eg.1">
    </div>
    <div class="form-group">

        <label for="f2">Floor</label>
        <input type="number"name="floor" id="f2" class="form-control" value="<?=($old) ? $_SESSION['POST']['floor'] : $house->floor?>" placeholder="eg.1">
    </div>

    <select class="form-select" name="isHouse">

        <option value="1">House</option>
        <option value="0">Flat</option>

    </select>
    <div class="form-group mt-3">
        <label for="uploadfile">Upload a photo</label>
                <input class="form-control inputs-design" type="file" name="image" value="" />
        </div>


            <input type="hidden" name="id" value="<?=$house->id?>">

            <button type="submit" name="update" class="btn-save mt-3 mb-3">Save</button>
        </form>
</div>

<?php include $_INNER_PATH . "/components/footer.php"?>
<?php
$_SESSION['POST'] = [];
?>