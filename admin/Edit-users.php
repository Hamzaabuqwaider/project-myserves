<?php 
    ob_start();
   $titlePage = "Edit-admin";
   include ("include/session.php");
   include ("include/connect.php");
   include ("include/header-admin.php");
   include ("include/navadmin.php");
   include ("include/function.php");


   if(isset($_SESSION['admin'])){

    $action  = isset($_GET['action']) ? $_GET['action'] : 'Edit';
    $User_ID = $_GET['User_ID'];

    if($action == 'Edit'){ 
        
        $stmt = $con->prepare('SELECT * FROM users WHERE id = ? ');

        $stmt->execute(array($User_ID));

        $row = $stmt->fetch();

        ?>

<div class="edit-profile" >
<form action="" method="POST">
<div class="container">
<div class="col-xl-12 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card " style="margin-top: 50px;">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2"> إضافة مستخدم</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">الأسم الاول</label>
					<input type="text" class="form-control" id="fullName" name="F_name" Value="<?php echo $row['first_name'] ?>"  placeholder="الأسم الاول">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">الأسم الأخير</label>
					<input type="text" class="form-control" id="eMail" name="L_name" Value="<?php echo $row['last_name'] ?>"  placeholder="الأسم الاخير">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">النوع</label>
                    <select id="inputState" class="form-control" 
                            name="type"
                            aria-label="Default select example " >
                            <option selected value='1'>مستخدم عادي</option>
                            <option value='2'>عميل</option>
                    </select>				
                </div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label for="name">البريد الكتروني</label>
                    <input type="email" class="form-control " id="inlineFormInput" name='email' Value="<?php echo $row['Email'] ?>"  placeholder="البريد الكتروني">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="sTate"> كلمة المرور </label>
				</div>
                    <input type="password" id="inputPassword6" class="form-control" name="password"  Value="<?php echo $row['password'] ?>"  aria-describedby="passwordHelpInline">
			</div>
          
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-left">
					<a href="index.php"><button type="button" id="submit" name="submit" class="btn btn edit-one ">الغاء</button></a>
					<button type="submit" id="submit" name="submit" class="btn btn edit-tow ">تـعديـل</button>
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
             if(isset($_POST["submit"])){
                $First_Name = $_POST['F_name'];
                $Last_Name = $_POST['L_name'];
                $email = $_POST['email'];
                $type = $_POST['type'];
                $Pass = MD5($_POST['password']);
    
                if(empty($First_Name)){
                    $formErrors[] = 'First Name Cant Be <strong> Empty</strong>';
                }
                if(empty($Last_Name)){
                    $formErrors[] = 'First Name Cant Be <strong> Empty</strong>';
                }
                if(empty($email)){
                    $formErrors[] = 'First Name Cant Be <strong> Empty</strong>';
                }
                if(empty($Pass)){
                    $formErrors[] = 'First Name Cant Be <strong> Empty</strong>';
                }
                foreach($formErrors as $error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>' ;
                }
    
                if(empty($formErrors)){
                        $stmt = $con->prepare("UPDATE users SET 
                                                            type = ?,
                                                            password = ?,
                                                            Email = ?,
                                                            first_name = ?,
                                                            last_name = ?
                                                            WHERE id = '".$User_ID."'");
                        $stmt->execute(array(
                                          $type,
                                          $Pass,
                                          $email,
                                          $First_Name,
                                          $Last_Name,
                                            ));
    
                        echo "<script>alert('تـم تعديل معلـوماتـك بنجـاح ');</script>";
                        
                        $Location = "users.php?do=Manage";
    
                        redirectHome($Location);
                                            
                    
                }

    } 
}
include ("include/footer-admin.php");?>
<?php
 }else {

    header('Location: index.php');

    exit();
}

 
?>