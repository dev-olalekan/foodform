<?php

// connect to the database
$conn = mysqli_connect('localhost', 'olalekan-php', 'test1234', 'food_order');

// check connection
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}

// write query fall all food
$sql = 'SELECT title, ingredients, id FROM foodmenu';

// make querry and get result
$result = mysqli_query($conn, $sql);

// fetch the result of row as an array

$foods = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memeory
mysqli_free_result($result);

// close connectio
mysqli_close($conn);

// print_r($foods);

?>

<?php

// $link = mysqli_connect('localhost', 'olalekan-php', 'test1234');
/* if (!$link) {
    echo 'Connection error: ' . mysqli_connect_error();
} */

?>



<!DOCTYPE html>
<html lang="en">

<?php include('template/header.php') ?>

<!-- to render data -->
<div class="container text-center text-success">FOOD MENU</div>
<div class="container">
    <div class="row">
        <?php foreach ($foods as $food) { ?>
            <div class="col-6 col-sm-4 d-flex ">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($food['title']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($food['ingredients']); ?></p>
                        <a href="#" class="btn btn-primary">More info</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



<?php include('template/footer.php') ?>

</html>