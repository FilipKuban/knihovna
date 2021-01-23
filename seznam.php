<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Seznam knih</title>
  </head>
  <body>
    <h1 class = "mt-5 text-center">Seznam knih</h1>

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
	}
	mysqli_query($con, "SET NAMES 'utf8'");

	if (!($vysledek = mysqli_query($con, "SELECT * FROM knihy"))) {
		die("Nelze provést dotaz 1.</body></html>");
	}
	?>
 <div class="d-flex justify-content-center mt-5"> 
	
	<table >

    <tr >
        <td class="tab-reg bg-info">Kniha</td>
        <td class="tab-reg bg-info">Jmeno autora</td>
        <td class="tab-reg bg-info">Prijmeni autora</td>
        <td class="tab-reg bg-info">Popis</td>
        <td class="tab-reg bg-info">ISBN</td>
    </tr>

		<?php
		while ($radek = mysqli_fetch_array($vysledek)) {
		?>
			
			<tr>
                <td class="tab-reg"><?php echo " " .  htmlspecialchars($radek["nazev"]); ?></td>
                <td class="tab-reg"><?php echo "" .  htmlspecialchars($radek["jmeno"]); ?></td>
				<td class="tab-reg"><?php echo "" .  htmlspecialchars($radek["prijmeni"]); ?></td>
				<td class="tab-reg"><?php echo "" .  htmlspecialchars($radek["popis"]); ?></td>
				<td class="tab-reg"><?php echo "" .  htmlspecialchars($radek["isbn"]); ?></td>
			</tr>
		<?php
		}
		?>
    </table>
    </div>
	<?php
	mysqli_free_result($vysledek);
	mysqli_close($con);
	?>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    
  </body>
</html>