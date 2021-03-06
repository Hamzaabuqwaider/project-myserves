<?php
ob_start();
$titlePage = "edit-information";
include ("include/session.php");
include ("include/connect.php");
include ("include/header.php");
include ("include/topnav.php");
include ("include/function.php");
include('include/loding.php');

if (isset($_SESSION['userid'])){

    $do = isset($_GET['do']) ? $_GET['do'] : 'Edit';

    if($do == 'Edit'){

        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) :0;

        $stmt = $con->prepare('SELECT * FROM users WHERE id = ? LIMIT 1 ');

        $stmt->execute(array($userid));

        $row = $stmt->fetch();
        
        $count =$stmt->rowCount();

        if($count > 0){ ?>
<div class="edit-profile">
<form action="?do=Update" method="POST" enctype = "multipart/form-data">
        <input type="hidden" name='userid' value="<?php echo $userid ?>"/>
<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img id="uplodeimgedit"  src="layot/img/<?php echo $row['imgg'] ?>" alt="">

                    <div class="p-image">
                     <abbr title="تعديل الصوره الشخصيه"><i onclick="uptateimge()" class="fa fa-camera upload-button icon-edit"></i></abbr>
                    </div>
                    <input type="file" id="uplode-img-edit" name="upload" onchange ="readUrledit(this)" hidden>
				</div>
				<h5 class="user-name"><?php echo $row['first_name'] ." ". $row['last_name'] ?></h5>
				<h6 class="user-email"><?php echo $row['Email'] ?></h6>
                
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2">معلومات الشخصية:</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">الأسم الاول</label>
					<input type="text" class="form-control" id="fullName" name="F_name" value='<?php echo $row['first_name'] ?>' placeholder="الأسم الاول">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">الأسم الأخير</label>
					<input type="text" class="form-control" id="eMail" name="L_name" value='<?php echo $row['last_name'] ?>' placeholder="الأسم الاخير">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
                <label for="name">البريد الكتروني</label>
                    <input type="email" class="form-control " id="inlineFormInput" name='email'  value="<?php echo $row['Email'] ?>" placeholder="البريد الكتروني">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">تاريخ الميلاد</label>
                    <input type="date" class="form-control"  name="date_birth" value='<?php echo $row['date_birth'] ?>'> 
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="sTate">كلمة المرور الحاليه</label>
                    <input type="password" id="inputPassword6" class="form-control" name="oldpassword"  value="<?php echo $row['password'] ?>" aria-describedby="passwordHelpInline">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="zIp">كلمة المرور الجديده</label>
                    <input  type="password" id="inputPassword6" class="form-control" name="newpassword" aria-describedby="passwordHelpInline">

				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-left">
					<a href="index.php"><button type="button" id="submit" name="submit" class="btn btn edit-one ">الغاء</button></a>
					<button type="submit" id="submit" name="submit" class="btn btn edit-tow ">تحديث</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</form>
</div>

<?php

} else {?>

    <script> alert('لا يمكنك الوصول لهذا المستخدم')</script>

<?php }

} elseif($do == 'Update'){

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id = $_POST['userid'];
        $First_Name = $_POST['F_name'];
        $Last_Name = $_POST['L_name'];
        $Date_Birth = $_POST['date_birth'];
        $Email = $_POST['email'];
        $Pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : MD5($_POST['newpassword']);
        $image = $_FILES['upload'];
        $imageName   = $image['name'];
        $imageSize   = $image['size'];
        $imageTemp   = $image['tmp_name'];
        $imageType   = $image['type'];
        $imageAllowedExtentions = array("jpeg" , "jpg", "png" , "gif");
        $image = rand(0 , 100000) . '_' . $imageName;
        move_uploaded_file($imageTemp,'layot/img/' .$image);
                $stmt = $con->prepare("UPDATE users SET 
                                                        first_name = ?, 
                                                        last_name = ?, 
                                                        date_birth = ?, 
                                                        Email = ?,
                                                        password=?,
                                                        imgg=?
                                                        WHERE id ='".$_SESSION['userid']."'");
                $stmt->execute(array(
                                    $First_Name,
                                    $Last_Name,
                                    $Date_Birth,
                                    $Email,
                                    $Pass,
                                    $image,
                                    ));
                                    echo '<script>alert("تم تعديل معلوماتك ")</script>';
                                    $location ="index.php";
                                    redirect($location);
        }
    }
include ("include/footer.php");
}else {
    header("Location: main-login.php");
}

?>
    
        