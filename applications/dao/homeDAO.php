<?php
include 'EnrollmentSystem_BaseDAO.php';

class homeDAO extends EnrollmentSystem_BaseDAO {
	function viewSubjects(){
		$this->openConn();
		$stmt=$this->dbh->prepare("SELECT * FROM subjects");
		$stmt->execute();

		$this->closeConn();

		while($row=$stmt->fetch()){
			echo"<tr id=".$row[0].">";
			echo"<td>".$row[1]."</td>";
			echo"<td>".$row[2]."</td>";
			//echo "<td><img class='delete' src='images/delete.png' onclick='deleteContacts(".$row[0].")'/>";
		    //echo "<img class='edit' src='images/edit.png' onclick='editContacts(".$row[0].")'/></td>";
			echo "</tr>";

		}

	}
	function viewTeachers(){
		$this->openConn();
		$stmt=$this->dbh->prepare("SELECT * FROM teachers;");
		$stmt->execute();

		$this->closeConn();

		while($row=$stmt->fetch()){
			echo "<tr id=".$row[0].">";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[4]."</td>";
			echo"</tr>";

		}
	}
	function viewSections(){
		$this->openConn();
		$stmt=$this->dbh->prepare("SELECT * FROM sections");
		$stmt->execute();

		$this->closeConn();

		while($row=$stmt->fetch()){
			echo "<tr id=".$row[0].">";
			echo "<td>".$row[0]."</td>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "</tr>";
		}
	}
	function addStudents($firstname,$middleInitial,$lastname,$year,$phone,$email,$username,$password,$confirm_password){
		$this->openConn();
		$insert_statement=$this->dbh->prepare("INSERT into students (firstname,middleInitial,lastname,year,phone,email,username,password,confirm_password) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);");
		$insert_statement->bindParam(1,$firstname);
		$insert_statement->bindParam(2,$middleInitial);
		$insert_statement->bindParam(3,$lastname);
		$insert_statement->bindParam(4,$year);
		$insert_statement->bindParam(5,$phone);
		$insert_statement->bindParam(6,$email);
		$insert_statement->bindParam(7,$username);
		$insert_statement->bindParam(8,$password);
		$insert_statement->bindParam(9,$confirm_password);
		$insert_statement->execute();
		$id = $this->dbh->lastInsertId();

		//echo $firstname;
		$this->closeConn();

	}
}












?>