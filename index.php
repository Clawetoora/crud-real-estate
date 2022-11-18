<?php include "./components/head.php";
include $_INNER_PATH . "/routes.php";
?>
      <div class="container d-flex flex-column">
      <div class="hero">
        <!-- <img src="./images/hero.jpg" alt=""> -->
      <div class="filtras">
        <?php include $_INNER_PATH . "/components/filter.php"?>
      </div>
      </div>



      <?php foreach ($houses as $house) {?>

        <a href="<?=$_OUTER_PATH . '/views/house/show.php?show=' . "&id=$house->id"?>" class="car mb-3 text-decoration-none">
          <div class="img-container">
            <img src="<?php
if ($house->image == null) {
	echo "./images/default1.jpg";
} else {

	echo "./images/" . $house->image;
}?>" alt="" />

          </div>
          <div class="about-container">
          <h1 id="car-title"><?=$house->address?></h1>
          <p id="about-car">
            <?php
if ($house->isHouse) {
	echo "House";
} else {
	echo "Flat";
}
	?>
          </p>
            <h3 id="model-year">Rooms: <?=$house->roomCount?></h3>
            <p id="about-car">
              <?php if (($house->isHouse)) {
		echo "";
	} else {
		echo "Floor: " . $house->floor;
	}
	?>
            </p>
          </div>
          <input type="hidden" name="id" value=" <?=$house->id?>">
        </a>


        <?php }?>

        </div>
      </div>
    </div>


<?php include $_INNER_PATH . "/components/footer.php"?>

