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
    <input type="text" name="name" placeholder="Name or ID here..."/>
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

    //id
    $pokeId = $pokeResult['id'];
    echo "<h3>" ."#". $pokeId. "</h3>";

    // picture
    $pokeImage = $pokeResult ['sprites']['front_default'];
    echo "<img src= '$pokeImage' />";

    //moves
    $pokeMove = $pokeResult ['moves'];
    for($i=0; $i<4; $i++){
    echo "<br>".$pokeMove[$i]['move']['name'];
    }
  
    //evolution
    $pokeEvolution = "https://pokeapi.co/api/v2/pokemon-species/" . $pokeId;
    $pokeEvJson = file_get_contents($pokeEvolution);
    $pokeEvResult = json_decode($pokeEvJson, true);
    // evolution name
    $pokeEvName = $pokeEvResult['evolves_from_species']['name'];
    echo "<h4>" ."Previous evolution is ".$pokeEvName ."</h4>"; 

    

}  


 ?>
</form>    
</body>
</html>

