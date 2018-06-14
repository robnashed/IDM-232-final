
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">


    <title>EZ Cook</title>
</head>

<?php
include 'includes/header.php';
include 'includes/db_connection.php'; 
$searchValue = htmlspecialchars($_GET["search"]);


$sqlSearch = "SELECT * FROM recipemain WHERE `recipe_title` LIKE '%{$searchValue}%'";
$resultSearch = mysqli_query($connection, $sqlSearch);
$rowSearch = mysqli_fetch_assoc($resultSearch);
?>

<div class="recipes">
<?php
                while($rowSearch = mysqli_fetch_assoc($resultSearch)) {
            ?>
                <a class="recipeLink" href= <?php echo "recipe.php?recipe-id={$rowSearch['recipe_id']}" ?> >
                <div class="recipeIcn" id="recipe-<?php echo $rowSearch['recipe_id']?>">

                <div class="recipeName"><?php echo $rowSearch['recipe_title']?> </div>
                </div>
                </a>
                <style>
                    #recipe-<?php echo $rowSearch['recipe_id']?> {
                        background: url('images/<?php echo $rowSearch['img_folder'] . "/" . $rowSearch['recipe_thumb'] . ".jpg" ?>');
                        background-size: cover;
                    }

                </style>

                    <?php
                }
                if ($rowSearch = 0){
                    echo "Nothing found. Please search again.";
                }
                ?>
                </div>
                </div>
            </body>
            </html>

