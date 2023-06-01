<?php
    session_start();


	include_once("../conexao.php");
	$km = mysqli_real_escape_string($conn, $_POST['km']);


				if($km > 1) {
              echo" <script type=\"text/javascript\">
						alert(\"teste.\");
					</script>";
            }

<?php $conn->close(); ?>
