<?php
/* if (isset($_GET['submit'])) {
    echo $_GET['email'];
    echo $_GET['title'];
    echo $_GET['ingredients'];
} */

// to store error variable
$title = $email = $ingredients = '';
$errors = array('email' => '', 'title' => '', 'ingredients' => '');

if (isset($_POST['submit'])) {
    /* echo $_POST['email'];
    echo $_POST['title'];
    echo $_POST['ingredients']; */

    // check for email
    if (empty($_POST['email'])) {
        // echo "enter email address <br />";
        $errors['email'] =  "enter email address <br />";
    } else {
        // echo htmlspecialchars($_POST['email']);
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // echo 'email must be a valid email address';
            $errors['email'] = 'email must be a valid email address';
        }
    }

    // check for title
    if (empty($_POST['title'])) {
        // echo "enter title <br />";
        $errors['title'] =  "enter title <br />";
    } else {
        // echo htmlspecialchars($_POST['title']);
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            // echo 'title must be letter and space only';
            $errors['title'] = 'title must be letter and space only';
        }
    }

    // enter atleast one ingredient
    if (empty($_POST['ingredients'])) {
        // echo "enter ingredient <br />";
        $errors['ingredients'] = "enter ingredient <br />";
    } else {
        // echo htmlspecialchars($_POST['ingredient']);
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            // echo 'ingredient must be comma separated list only';
            $errors['ingredients'] = 'ingredient must be comma separated list only';
        }
    }

    if (array_filter($errors)) {
        // echo 'error in the form';
    } else {
        // echo 'the form is valid';
        // this will be directed to the index.php after successfully submitted
        header('Location: index,php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('template/header.php') ?>

<section class="container mt-3">
    <h4 class="text-center">Add a Pizza</h4>

    <form action="add.php" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="enter email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="text-danger"><?php echo $errors['email']; ?></div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Pizaa</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="food type" value="<?php echo htmlspecialchars($title) ?>">
            <div class="text-danger"><?php echo $errors['title']; ?></div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Ingredient (comma separated)</label>
            <input type="text" name="ingredients" class="form-control" id="exampleFormControlInput1" placeholder="ingredient" value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="text-danger"><?php echo $errors['ingredients']; ?></div>
        </div>
        <!-- <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div> -->

        <!-- <button type="submit" class="btn btn-primary d-block mx-auto">Submit</button> -->
        <button type="submit" name="submit" value="submit" class="btn btn-primary d-block">Submit</button>
    </form>

</section>

<?php include('template/footer.php') ?>

</html>