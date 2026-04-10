
<!DOCTYPE html>
<html lang='cs'>
  <head>
    <title>Registrace sportovce - Sportovní klub SPŠEI Ostrava</title>
    <meta charset='utf-8'>
    <link href="styl.css" rel="stylesheet" type="text/css"> 
  </head>
  <body>
    <h1>Sportovní klub SPŠEI Ostrava</h1>

  
    <form class="vyhledavaci">
      <input type="text" name="vyhledat" placeholder="Hledaný text...">
      <input type="submit" value="Vyhledat">
    </form>

    <?php

      // TODO: zpracování vyhledávacího formuláře
     

    ?>

    <main>

    <h2>Registrace sportovce</h2>

    <?php
      $sporty = [
        1 => "fotbal", "hokej", "basketbal", "volejbal", "florbal", "atletika",
             "tenis", "stolní tenis", "plavání", "cyklistika"
      ];
      
       // TODO: zpracování registračního formuláře
       if(isset($_POST["odeslat"]))
       {
         
       }

    ?>

     <form method="post"> <!-- TODO: dokončit formulář pro umožnění uploadu kartičky pojištěnce -->

     <fieldset>
        <legend>Osobní údaje</legend>

        <div class="povinnaPolozka">
          <label for="jmeno">Jméno</label>
          <input type="text" name="jmeno" id="jmeno" required>
        </div>

        <div class="povinnaPolozka">
           <label for="prijmeni">Příjmení</label>
           <input type="text" name="prijmeni" id="prijmeni" required>
        </div>

        <div  class="povinnaPolozka">
          <label for="datum_narozeni">Datum narození</label>
          <input type="date" name="datum_narozeni" id="datum_narozeni" required>
        </div>

        <div>
          <label for="rodne_cislo">Rodné číslo</label>
          <input type="text" name="rodne_cislo" id="rodne_cislo">
        </div>

      </fieldset>

      <fieldset>
        <legend>Adresa</legend>

        <div>
          <label for="ulice">Ulice</label>
          <input type="text" name="ulice" id="ulice">
        </div>
        <div>
          <label for="cislo">Číslo</label>
          <input type="text" name="cislo" id="cislo">
        </div>
        <div>
          <label for="mesto">Město</label>
          <input type="text" name="mesto" id="mesto">
        </div>
        <div>
          <label for="psc">PSČ</label>
          <input type="text" name="psc" id="psc">
        </div>

      </fieldset>

      <fieldset>
        <legend>Kontakty</legend>

        <div>
          <label for="email">Email</label>
          <input type="email" name="email" id="email">
        </div>
        <div>
          <label for="mobil">Mobil</label>
          <input type="text" name="mobil" id="mobil">
        </div>

      </fieldset>

      <fieldset>
        <legend>Aktivně provozované sporty</legend>  

        <div>
          <label for="sporty">Sporty</label>
          <select name="sporty[]" id="sporty" multiple>
                <?php 
                  // TODO: doplnit volby na základě pole $sporty
                  for( $i = 0; $i < count($sporty); $i++)
                  {
                    
                    echo  "<option value=".$i.">".$sporty[$i]."</option>" ;
                  }
                ?>
          </select>  
        </div>
       
       </fieldset>  
      
       <fieldset>
        <legend>Další údaje</legend>
       
        <div>
            <label for="karticka_pojistovny">Průkaz zdravotní pojišťovny</label>
            <input type="file" id="karticka_pojistovny" name="karticka_pojistovny"> 
        </div>

        <div>
            <label for="pozvanka">Zasílat pozvánky na tréninky emailem</label>
            <input type="checkbox" id="pozvanka" name="pozvanka"> 
        </div> 
        <div>
          <label for="poznamka">Poznámka</label>
          <textarea id="poznamka" name="poznamka"></textarea>  
        </div>

        </fieldset>

        <div>
          <input type="submit" value="Registrovat">
        </div>

     </form>

     <?php

        // TODO: vypsat obsah složky data/pojistovna
        
     ?>

    </main> 
  </body>
</html>