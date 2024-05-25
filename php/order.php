<?php  
session_start();

 

	# Database Connection File
	include "../db_conn.php";


    /** 
	  check if author 
	  name is submitted
	**/
	if (isset($_POST['name'])) {
		/** 
		Get data from POST request 
		and store it in var
		**/
		$name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $id = $_POST['id'];


		#simple form Validation
	 
			# Insert Into Database
			$sql  = "INSERT INTO orders (name, phone, email, address, book_id)
			         VALUES (?,?,?,?,?)";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$name, $phone, $email, $address, $id]);

			/**
		      If there is no error while 
		      inserting the data
		    **/
		     if ($res) {
		     	# success message
		     	$sm = "Successfully order recorded!";
				header("Location: ../thanks.php?success=$sm");
	            exit;
		     }else{
		     	# Error message
		     	$em = "Unknown Error Occurred!";
				header("Location: ../order.php?error=$em");
	            exit;
		     } 
    }