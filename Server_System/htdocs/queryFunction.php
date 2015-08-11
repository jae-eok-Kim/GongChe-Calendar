<?php
	$db_host = "localhost";
	$db_user = "gongche";
	$db_passwd = "1q2w3e4r5t";
	$db_name = "gongche";
	$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

	if (mysqli_connect_errno($conn)) {
	echo "데이터베이스 연결 실패: " . mysqli_connect_error();
	} else {
	echo "성공~!!!";
	}

	$result = mysqli_query($conn,"SELECT * FROM gongche WHERE large_companies = '1' ");
	echo "<table border='1'> <tr> <th>필드1</th> <th>필드2</th> <th>필드3</th> <th>필드4</th> <th>필드5</th> <th>필드6</th> <th>필드7</th> <th>필드8</th><th>필드8</th><th>필드9</th><th>필드10</th></tr>";
	$n = 1;
	while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td>" . $row['company_ID'] . "</td>";
	echo "<td>" . $row['job_name'] . "</td>";
	echo "<td>" . $row['company_url'] . "</td>";
	echo "<td>" . $row['published'] . "</td>";
	echo "<td>" . $row['deadline_data'] . "</td>";
	echo "<td>" . $row['occupations'] . "</td>";
	echo "<td>" . $row['in_Jobs'] . "</td>";
	echo "<td>" . $row['large_companies'] . "</td>";
	echo "<td>" . date( "Y", strtotime($row['deadline_data']) ) . "</td>";
	echo "<td>" . date( "m", strtotime($row['deadline_data']) )  . "</td>";
	echo "<td>" . date( "d", strtotime($row['deadline_data']) )  . "</td>";
	echo "</tr>";
	$n++;
	}
	echo "</table>";
	mysqli_close($conn);
?>