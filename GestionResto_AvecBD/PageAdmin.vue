
<template>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Modifier un plat</title>
    </head>
    <body>
      <h1>Modifier un plat</h1>
    
     
    
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="idPlat" value="<?php echo $plat['idPlat']; ?>">
    
        <label for="nomPlat">Nom du plat:</label>
        <input type="text" name="nomPlat" ><br>
    
        <label for="calorie">Calorie:</label>
        <input type="text" name="calorie" ><br>
    
        <label for="proteine">Protéine:</label>
        <input type="text" name="proteine" ><br>
        <label for="prixPlat">Prix du plat:</label>
        <input type="text" name="prixPlat" ><br>
        <label for="prixFinal">Prix final:</label>
        <input type="text" name="prixFinal" ><br>
        <label for="quantite">Quantité:</label>
        <input type="text" name="quantite" ><br>
        <input type="submit" value="Modifier">
      </form>
    
      
    </body>
    </html>
    
    
</template>

<script>


</script>

<style>
input[type="text"][value]:not(:focus),
input[type="password"][value]:not(:focus),
input[type="email"][value]:not(:focus),
textarea[value]:not(:focus) {
  color: transparent;
  text-shadow: 0 0 0 black;
}


</style>