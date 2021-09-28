<style>
body {
	font-family: Arial;
	padding: 10px;
	background: #333;
	color: #E7E7E7;
	text-align: center;
}
</style>

<body>
<?php

$signs = array(
    "monkey.png" => "monkey",
    "bakk bak roster.png" => "rooster",
    "doggo.png" => "dog",
    "piggy.png" => "pig",
    "rat.png" => "rat",
    "ox.png" => "ox",
    "tiger.png" => "tiger",
    "rabit.png" => "rabbit",
    "dragon.png" => "dragon",
    "sssnake.png" => "snake",
    "horsie girl.png" => "horse",
    "goat.png" => "goat"
);

foreach ( $signs as $image => $caption ) {
    $size = getimagesize("images/$image");
    //DEBUGGING print_r($size);
    echo '<a href="images/'.$image.'"><img src="images/'.$image.'" alt="'.$caption.'" height="110" width="110"></a>';
}
?>
</body>