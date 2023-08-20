<?php
	session_start(); 
 ?>
<?php require_once("includes/connection.php");?>
<?php include("includes/permission.php");?>
<?php include ("includes/header.php"); ?>
<?php
	$sql = "SELECT * FROM admin";
	$query = mysqli_query($conn,$sql);
?>
<a href="them-thanh-vien.php">Thêm thành viên</a>
<table border="1px;" align="center">
	<thead>
		<tr>
			<td bgcolor="#E6E6FA">ID</td>
			<td bgcolor="#E6E6FA">Username</td>
			<td bgcolor="#E6E6FA">Email</td>
			<td bgcolor="#E6E6FA">Khóa tài khoản</td>
			<td bgcolor="#E6E6FA">Quyền</td>
			<td bgcolor="#E6E6FA">Hành động</td>
		<tr>
	</thead>
	<tbody>
	<?php 
		while ( $data = mysqli_fetch_array($query) ) {
			$a = 3;
			$id = $data['id'];
	?>
		<tr>
			<td><?php echo $a; ?></td>
			<td><?php echo $data['username']; ?></td>
			<td><?php echo $data['email']; ?></td>
			<td><?php echo ($data['is_block'] == 1) ? "Bị khóa" : "Không bị khóa"; ?></td>
			<td><?php echo ($data['permision'] == 0) ? "Thành viên thường" : "Admin"; ?></td>
			<td>
				<a href="chinhsuathanhvien.php?id=<?php echo $id;?>">Sửa</a>
				<a href="quanlithanhvien.php?id_delete=<?php echo $id;?>">Xóa</a>
			</td>
		</tr>
	<?php
			echo $a;
			$a++;
		}
	?>
	</tbody>
</table>
<?php include "includes/footer.php" ?>