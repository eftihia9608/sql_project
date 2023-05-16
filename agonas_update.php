<?php
				
					echo 'Τα στοιχεία που παραλήφθηκαν'."<br />";
					echo "<br />";
					
					echo "id_αγώνα:  ";
					echo $_POST['id_αγώνα']."<br />";
					
					
					
		?>
			<p/>
			
		<?php
			//	Ανάθεση μεταβλητών στα δεδομένα από τη φόρμα
				$gnwrisma=$_POST['gnwrisma'];
				$change=$_POST['change'];
				$id_αγώνα=$_POST['id_αγώνα'];
				
		
		
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
				$sql = "UPDATE Αγώνας
						SET $gnwrisma = $change
						WHERE id_αγώνα='$id_αγώνα'";
						
						
				$howmatch=	"SELECT * 
							FROM Αγώνας";
				
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