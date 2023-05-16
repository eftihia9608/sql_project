<?php
				
					echo 'Τα στοιχεία που παραλήφθηκαν'."<br />";
					echo "<br />";
					
					echo "ΑΜΚΑ:  ";
					echo $_POST['ΑΜΚΑ']."<br />";
					
					
		?>
			<p/>
			
		<?php
			//	Ανάθεση μεταβλητών στα δεδομένα από τη φόρμα
                $ΑΜΚΑ=$_POST['ΑΜΚΑ'];

                $servername = "localhost";
                $username = "root";
                $password = "";
				
		
			//	Σύνδεση με τη ΒΔ
        global $count;
        global $db;
				$db='local_champion';
				$conn = new mysqli($servername, $username, $password);
            // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                        }
                echo "Connected successfully";

				
				//Επιλογή ΒΔ
                $conn = new mysqli($servername, $username, $password, $db);				

				
				//Εισαγωγή των υποερωτήσεων (queries)
				$sql=	"DELETE FROM Προπονητής 
						WHERE ΑΜΚΑ='$ΑΜΚΑ'";
						
				$howmatch=	"SELECT * 
							FROM Προπονητής";
				
				//Εισαγωγή δεδομένων στη ΒΔ
                $conn = new mysqli($servername, $username, $password, $db);

                $pdo="Set foreign_key_checks = 0";
                $foreign = $conn->query($pdo);

				if ($conn->query($sql) === TRUE) {
                    echo "The record is deleted";
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }

				//Αίτηση με id=1
				$Res=$conn->query($howmatch);
				while($row=mysqli_fetch_array($Res))
				{
					$count++;
				}
				echo "Νέο σύνολο: ".$count." εγγραφές.";
				echo "<br />";
				
				$pdo="Set foreign_key_checks = 1";
                $foreign = $conn->query($pdo);
				//Τερματισμός σύνδεσης
				mysqli_close($conn);
			
			?>