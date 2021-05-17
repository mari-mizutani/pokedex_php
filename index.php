<?php
if(!empty($_GET["name"])){
    $pokeApiUrl = "https://pokeapi.co/api/v2/pokemon/".urlencode($_GET["name"]);
    $pokeJson = file_get_contents($pokeApiUrl);
    $pokeArray = json_decode($pokeJson,true);

    $name = $pokeArray["results"][0]["name"];
}  
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
</head>
<body>
<form action="" method="POST">
    <input type="text" name="name" placeholder="Pokemon name here...">
    <button type="submit">SUBMIT</button>
    <br>
    <?php
    if(!empty($pokeArray)){
        foreach($pokeArray["name"] as $pokeName){
            echo $pokeName;
        }
    }

    ?>  
</form>    
</body>
</html>

