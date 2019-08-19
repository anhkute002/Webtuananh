<!DOCTYPE html>
<html>
<body>

<h1>DATABASE CONNECTION</h1>

<?php
ini_set('display_errors', 1);
echo "Hello Cloud computing class 0818!";
?>

<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     echo '<p>The DB exists</p>';
     echo getenv("dbname");
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=ec2-50-19-222-129.compute-1.amazonaws.com;port=5432;user=mnyhjyobzgfjiy;password=dbe76233bc0228c6f84701882d826b68f82485d49017dad9666b2b7a0bd11420;dbname=dcqr76jlvrn6b6",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

$sql = "SELECT * FROM student ORDER BY stuid";
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();
echo '<p>Students information:</p>';

?>
<div id="container">
<table class="table table-bordered table-condensed">
    <thead>
      <tr>
        <th>Student ID</th>
        <th>Name</th>
        <th>email</th>
        <th>Class</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // tạo vòng lặp 
         //while($r = mysql_fetch_array($result)){
             foreach ($resultSet as $row) {
      ?>
   
      <tr>
        <td scope="row"><?php echo $row['stuid'] ?></td>
        <td><?php echo $row['fname'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['classname'] ?></td>
        
      </tr>
     
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
