
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
        if(isset($_POST['vyhledat'])){
            if($_POST['vyhledat'] != ""){
                echo "Neprazdny";
                echo $_POST['vyhledat'];
                echo  strlen($_POST['vyhledat']);
            }else echo "nebyl zadan text";
        }
     

    ?>

    <main>

    <h2>Registrace sportovce</h2>

    <?php
      $sporty = [
        1 => "fotbal", "hokej", "basketbal", "volejbal", "florbal", "atletika",
             "tenis", "stolní tenis", "plavání", "cyklistika"
      ];
      
       // TODO: zpracování registračního formuláře
       if(isset($_POST["odeslat"])) {
           echo htmlspecialchars($_POST["jmeno"]) . " " . htmlspecialchars($_POST["prijmeni"]) . "<br>";
           $naroz = date_create($_POST["datum_narozeni"]);
           echo "Datum narození z formuláře: " . $naroz->format("d.m.Y") . "<br>";

           $rodnecis = $_POST["rodne_cislo"];
           echo $rodnecis;
           if (str_contains($rodnecis, '/')) {
               echo "ano je tam lomitko";
           } else echo "neni tam lomitko";
           echo "pocet znaku " . strlen($rodnecis);

           $rok = substr($rodnecis, 0, 2);
           $mes = substr($rodnecis, 2, 2);
           $den = substr($rodnecis, 4, 2);

           if ($mes > 0 && $mes < 13) {
               echo "Muz";
           } else if ($mes > 50 && $mes < 63) {
               echo "Zena";
               $mes -= 50;
           } else if ($mes > 70 && $mes < 83) {
               echo "Zena";
               $mes -= 70;
           } else if ($mes > 20 && $mes < 33) {
               echo "Muz";
               $mes -= 20;
           } else {
               echo "Chyba";
           }

           $datum = date_create_from_format("d.m.y", $den . "." . $mes . "." . $rok);
           echo $datum->format("d.m.Y");
           if (date_diff(date_create("now"), $datum)->y >= 18) {
               echo "Plnolety";
           } else echo "Neplnolety";


           if (date_create($_POST["datum_narozeni"])->format("d.m.Y") == $datum->format("d.m.y")) {
               echo "Odpovida";
           } else echo "Neodpovida";
            echo "<ul>";
           if ($_POST["sporty"] && !empty($_POST["sporty"])) {

               $sporty = array($_POST["sporty"]);
               foreach ($sporty as $sp) {
                   echo "<li>".$sp."</li>";
               }
           }
           echo "</ul>";

           $povoleneTypySouboru = [
                   "image/png",
                   "image/jpeg",
                   "application/pdf",
           ];
           if ($_FILES["karticka_pojistovny"]) {
               echo $_FILES["karticka_pojistovny"]["name"];
               echo $_FILES["karticka_pojistovny"]["type"];
               echo $_FILES["karticka_pojistovny"]["size"];
           }

           if (isset($_FILES["karticka_pojistovny"]) && $_FILES["karticka_pojistovny"]["error"] == 0) {
               if (in_array($_FILES["karticka_pojistovny"]["type"], $povoleneTypySouboru) && $_FILES["karticka_pojistovny"]["size"] <= 3145728) {
                   if (file_exists("data/pojistovna")) mkdir("data/pojistovna", 0777, true);
                   move_uploaded_file($_FILES["karticka_pojistovny"]["tmp_name"], "data/pojitovna/" . $_FILES["karticka_pojistovny"]["name"]);
               }


           }
       }

    ?>

     <form method="post" enctype="multipart/form-data"> <!-- TODO: dokončit formulář pro umožnění uploadu kartičky pojištěnce -->

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
                  for( $i = 1; $i <= count($sporty); $i++)
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
            <input type="hidden" name="MAX_FILE_SIZE" value="30000000">
            <input type="file" id="karticka_pojistovny" name="karticka_pojistovny" accept=".png, .jpeg, .pdf">
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
          <input type="submit" value="Registrovat" name="odeslat" id="odeslat">
        </div>

     </form>
     <h3>Nahrane prukazy</h3>
        <ul>
     <?php

        // TODO: vypsat obsah složky data/pojistovna
        if(!is_file("data/pojistovna")){
            $soubory = glob("data/pojistovna/*.*");
            foreach($soubory as $file){
                echo "<li> ". basename($file)."</li>";
            }
        }


     ?>
        </ul>

    </main> 
  </body>
</html>