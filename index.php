<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
</head>
<body>
<form action="" method="GET">
    <input type="text" name="name" placeholder="Pokemon name here..."/>
    <button type="submit">SUBMIT</button>
    <br>
 <?php
   if(!empty($_GET['name'])){
    $pokeApiUrl = "https://pokeapi.co/api/v2/pokemon/" . urlencode($_GET['name']);
    $pokeJson = file_get_contents($pokeApiUrl);
    $pokeResult = json_decode($pokeJson, true);
    // name
    $pokeName = $pokeResult['name'];
    echo "<h1>$pokeName</h1>";

    // picture
    $pokeImage = $pokeResult ['sprites']['front_default'];
    echo "<img src= '$pokeImage' />";

    //moves
    $pokeMove = $pokeResult ['moves'];
    for($i=0; $i<5; $i++){
    echo $pokeMove[$i]['move']['name'];
    }
  
}  


 ?>
</form>    
</body>
</html>

