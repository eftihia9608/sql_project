<?php
				
					echo 'Τα στοιχεία που παραλήφθηκαν'."<br />";
					echo "<br />";
					
					echo "Όνομα  ";
					echo $_POST['Όνομα']."<br />";
					
					echo "Επώνυμο:  ";
					echo $_POST['Επώνυμο']."<br />";
					
					
		?>
			<p/>
			
		<?php
			//	Ανάθεση μεταβλητών στα δεδομένα από τη φόρμα
				$gnwrisma=$_POST['gnwrisma'];
				$change=$_POST['change'];
				$Όνομα=$_POST['Όνομα'];
				$Επώνυμο=$_POST['Επώνυμο'];;
				
		
		
				$servername = "localhost";
                $username = "root";
                $password = "";
				
		
			//	Σύνδεση με τη ΒΔ
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
				$sql = "UPDATE Διαιτητής
						SET $gnwrisma = $change
						WHERE Όνομα='$Όνομα' AND Επώνυμο='$Επώνυμο' ";
						
						
				$howmatch=	"SELECT * 
							FROM Διαιτητής";
				
				//Εισαγωγή δεδομένων στη ΒΔ
				$pdo="Set foreign_key_checks = 0";
                $foreign = $conn->query($pdo);

				if ($conn->query($sql) === TRUE) {
                    echo "The record is updated";
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
				

				//Αίτηση με id=1
				$Res=$conn->query($howmatch);
				while($row=mysqli_fetch_array($Res))
				{
					$count++;
				}
				echo "Παραμένων σύνολο: ".$count." εγγραφές.";
				echo "<br />";
				
				$pdo="Set foreign_key_checks = 1";
                $foreign = $conn->query($pdo);
				//Τερματισμός σύνδεσης
				mysqli_close($conn);
			
			?>