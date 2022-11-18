<?php
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/namainamuciai";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/namainamuciai";
include "$_INNER_PATH/components/head.php";
include $_INNER_PATH . "/routes.php";

?>

<div class="container">

    <div class="car-card">
        <div class="car-card-img">

            <img src="<?php
if ($house->image == null) {
	echo $_OUTER_PATH . "/images/default1.jpg";
} else {

	echo $_OUTER_PATH . "/images/" . $house->image;
}?>" alt="" />
        </img>

        </div>
        <div class="car-card-text">
        <h1><?=$house->address?></h1>
        <h3><?php if ($house->isHouse) {
	echo "Namas";
} else {
	echo "Butas";
}
?></h3>
        <p>Kambariu skaicius: <?=$house->roomCount?></p>
        <p>
        <?php if (($house->isHouse)) {
	echo "";
} else {
	echo "Aukštas " . $house->floor;
}
?>

  </p>
        </div>
        <div class="edit-delete">
        <form action="<?=$_OUTER_PATH . '/views/house/edit.php'?>" method="get">
            <input type="hidden" name="id" value="<?=$house->id?>">
            <button type="submit" name="edit" class="btn-edit">edit</button>
        </form>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?=$house->id?>">
            <button type="submit" name="destroy" class="btn-delete">delete</button>
        </form>
        </div>

</div>
</div>

<?php include $_INNER_PATH . "/components/footer.php"?>
