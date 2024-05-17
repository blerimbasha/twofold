<?php
include("db/db_connection.php");

$sql = "SELECT * FROM products";

$result = $conn->query($sql);
$rows = $result->fetch_assoc();

$rows = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc() ){
        $rows[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <h2>Products</h2>
    </nav>
<div class="grid-container">
    <div class="grid">
        <?php foreach ($rows as $key => $value): ?>
            <div class="card">
                <img src="<?php echo $value['image_url'] ?>" alt="">
                <h5><?php echo $value['title'] ?></h5>
                <p><?php echo $value['description']  ?></p>
            </div>
        <?php endforeach; ?>  
    </div>
  </div>
</div>
</body>
</html>

<script>
    ( function( $ ) {

"use strict";

$(".card").tilt({
maxTilt: 15,
perspective: 1400,
easing: "cubic-bezier(.03,.98,.52,.99)",
speed: 1200,
glare: true,
maxGlare: 0.2,
scale: 1.04
});

}( jQuery ) );
</script>