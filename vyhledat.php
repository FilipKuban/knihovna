<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Vyhledavani</title>
  </head>
  <body>
    <h1 class = "mt-5 text-center">Vyhledavani</h1>

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
		if ((isset($_POST["hledej"])) && (($_POST["isbn"] != "") || ($_POST["jmeno"] != "") || ($_POST["prijmeni"] != "") || ($_POST["nazev"] != ""))) {	
			$where1 = "%";
			$where2 = "%";
            $where3 = "%";
            $where4 = "%";

			if ($_POST['isbn'] != "") {
				$where1 = addslashes($_POST['isbn']);
			}
			if ($_POST['jmeno'] != "") {
				$where2 = addslashes($_POST['jmeno']);
			}
			if ($_POST['prijmeni'] != "") {
				$where3 = addslashes($_POST['prijmeni']);
            }
            if ($_POST['nazev'] != "") {
				$where4 = addslashes($_POST['nazev']);
			}
			if (!($vysledek = mysqli_query($con, "SELECT * FROM knihy WHERE isbn like '$where1' and jmeno like '$where2' and prijmeni like '$where3' and nazev like '$where4'"))) {
				die("Nelze provést dotaz 1.</body></html>");
			}

	?>
			<div class="d-flex justify-content-center mt-5"> 
			<table>
                <tr >
                      <td class="tab-reg bg-info">ISBN</td>
                      <td class="tab-reg bg-info">Kniha</td>
                      <td class="tab-reg bg-info">Jmeno autora</td>
                      <td class="tab-reg bg-info">Prijmeni autora</td>
                      <td class="tab-reg bg-info">Popis</td>
               </tr>
				<?php
				while ($radek = mysqli_fetch_array($vysledek)) {
				?>
						<tr>
                            <td class="tab-reg"><?php echo "" .  htmlspecialchars($radek["isbn"]); ?></td>
                            <td class="tab-reg"><?php echo " " .  htmlspecialchars($radek["nazev"]); ?></td>
                            <td class="tab-reg"><?php echo "" .  htmlspecialchars($radek["jmeno"]); ?></td>
			            	<td class="tab-reg"><?php echo "" .  htmlspecialchars($radek["prijmeni"]); ?></td>
				            <td class="tab-reg"><?php echo "" .  htmlspecialchars($radek["popis"]); ?></td>
			            </tr>
				<?php
				}
				?>
            </table>
            </div>
	<?php
		}
	}
	?>

<div class="d-flex justify-content-center mt-5"> 
            <table class = "tab-reg">
               <form action="vyhledat.php" method="post">
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
                    <td></td>
                    <td class = "tab-reg "><input type="submit" value="Hledat" name= "hledej"><input type="reset" value="Reset"></td>
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