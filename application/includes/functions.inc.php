<?php

function connectDB() {
	$dbcx = mysqli_connect(HOST, USER, PASS, DB);

	mysqli_set_charset($dbcx, 'UTF8');

	return $dbcx;
}

function insert ($product) {
	
	$dbcx = connectDB();

	$query = '
			INSERT INTO login(user, password)
			VALUES("%s", "%s")';

	$query = sprintf($query,
		$product['Username'],
		$product['Password']
	);

	mysqli_query($dbcx, $query);

}