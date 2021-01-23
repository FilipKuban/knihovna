<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Registrace knihy</title>
  </head>
  <body>
    <h1 class = "mt-5 text-center">Registrace knihy</h1>

    <ul class="nav justify-content-center">
    <li class="nav-item">
    <a href="registrace.php"><button type="button" class="btn btn-secondary btn-sm">Registrace</button></a>
  </li>
  <li class="nav-item">
    <a href="seznam.php"><button type="button" class="btn btn-secondary btn-sm">Seznam</button></a>
  </li>
  <li class="nav-item">
    <a href="vyhledat.php"><button type="button" class="btn btn-secondary btn-sm">Vyhledat</button></a>
  </li>
</ul>


<?php
	if (!($con = mysqli_connect("127.0.0.1", "kuban.cool.2", "Kojeneckavoda1", "kubancool2"))) {
		die("Nelze se připojit k databázovému serveru!</body></html>");
	} else {
		mysqli_query($con, "SET NAMES 'utf8'");
		if (isset($_POST["odesli"])) {
			if (($_POST["isbn"] != "") && ($_POST["jmeno"] != "") && ($_POST["prijmeni"] != "") && ($_POST["nazev"] != "") && ($_POST["popis"] != "")) {	

				if (mysqli_query(
					$con,
					"INSERT INTO knihy(isbn, jmeno, prijmeni,nazev, popis) VALUES('" .	
						addslashes($_POST["isbn"]) . "', '" .
						addslashes($_POST["jmeno"]) . "', '" .
                        addslashes($_POST["prijmeni"]) . "', '" .
                        addslashes($_POST["nazev"]) . "', '" .
						addslashes($_POST["popis"]) . "')"
				)) {
					ob_start();
					echo "<p class='text-center fs-3'>Uspesne vlozeno</p>";
					header("Refresh: 3; registrace.php");
					ob_end_flush();
				}
			} else {
				ob_start();
				echo "<p class='text-center fs-3'>Neulozeno</p>";
				header("Refresh: 3; registrace.php");
				ob_end_flush();
			}
		}
	}
	?>




        <div class="d-flex justify-content-center mt-5"> 
            <table class = "tab-reg">
               <form action="registrace.php" method="post">
               <tr >
                     <td class = "tab-reg">ISBN</td>
                     <td class = "tab-reg "><input type="text" name="isbn" id="" class="text-rig"></td>
                </tr>
                <tr >
                     <td class = "tab-reg">Jmeno autora</td>
                     <td class = "tab-reg "><input type="text" name="jmeno" id="" class="text-rig"></td>
                </tr>
                <tr >
                     <td class = "tab-reg">Prijmeni autora</td>
                     <td class = "tab-reg "><input type="text" name="prijmeni" id="" class="text-rig"></td>
                </tr>
                <tr >
                     <td class = "tab-reg">Nazev knihy</td>
                     <td class = "tab-reg "><input type="text" name="nazev" id="" class="text-rig"></td>
                </tr>
                <tr>
                    <td class = "tab-reg ">Popis</td>
                   <td class = "tab-reg "><textarea name="popis" id="" cols="23" rows="3"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td class = "tab-reg "><input type="submit" value="Ulozit" name= "odesli"><input type="reset" value="Reset"></td>
                </tr>
               </form>
            </table>
        </div>

        <?php
	mysqli_close($con);
	?>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    
  </body>
</html>