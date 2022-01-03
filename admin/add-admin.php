<?php 
    ob_start();
   $titlePage = "Edit-admin";
   session_start();
   include ("include/header-admin.php");
   include ("include/navadmin.php");
   include ("include/function.php");


   if(isset($_SESSION['admin'])){

    $action = isset($_GET['action']) ? $_GET['action'] : 'Add';

    if($action == 'Add'){
    
    ?>

<div class="edit-profile">
<form action="" method="POST">
<div class="container">
<div class="col-xl-12 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card "style="margin-top: 50px;">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2">إضـافـة آدمـن :</h6>
			</div>
			<div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">الأسم </label>
					<input type="text" class="form-control" id="fullName" name="name"  placeholder="الأسم ">
				</div>
			</div>
			
		</div>
		<div class="row gutters">
			
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
                <label for="name">البريد الكتروني</label>
                    <input type="email" class="form-control " id="inlineFormInput" name='email'  placeholder="البريد الكتروني">
				</div>
			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="sTate">كلمة المرور </label>
                    <input type="password" id="inputPassword6" class="form-control" name="password"   aria-describedby="passwordHelpInline">
				</div>
			</div>
		</div>
        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="main_full">
                            <div class="container">
                                <div class="panelss">
                                    <div class="button_outer">
                                        <div class="btn_upload">
                                            <input name="upload"  type="file" id="uploadss_file">
                                            <i class="far fa-images" style="color:#ddd;font-size:16px;"></i> إضافة صورة
                                        </div>
                                        <div class="processing_bar"></div>
                                        <div class="success_box"></div>
                                    </div>
                                </div>
                                <div class="error_msg"></div>
                                <div class="uploaded_file_view" id="uploaded_view">
                                    <span class="file_remove">X</span>
                                </div>
                            </div>
                        </div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-left">
					<a href="mainpage.php"><button type="button" id="submit" name="submit" class="btn btn edit-one ">الغاء</button></a>
					<button type="submit" id="submit" name="submit" class="btn btn edit-tow ">إضـافـة</button>
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
                $Name = $_POST['name'];
                $email = $_POST['email'];
                $Pass = MD5($_POST['password']);
                $imageName   = $_FILES['upload']['name'];
                $imageSize   = $_FILES['upload']['size'];
                $imageTemp   = $_FILES['upload']['tmp_name'];
                $imageType   = $_FILES['upload']['type'];
                $imageAllowedExtentions = array("jpeg" , "jpg", "png" , "gif");
                $imageExtension = strtolower(end(explode('.' , $imageName)));
    
    
                $formErrors = array();
    
                if(empty($Name)){
                    $formErrors[] = 'First Name Cant Be <strong> Empty</strong>';
                }
    
                foreach($formErrors as $error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>' ;
                }
    
                if(empty($formErrors)){
                    $image = rand(0 , 100000) . '_' . $imageName;
                    move_uploaded_file($imageTemp,'../layot/img/' .$image);
    
    
                        $stmt = $con->prepare("INSERT INTO admin (admin_name,email,Password,img) VALUES(:zname , :zemail , :zpassword ,:zimg)");
                        $stmt->execute(array(
                                          'zname'     =>  $Name,
                                          'zemail'    =>  $email,
                                          'zpassword' =>  $Pass,
                                          'zimg'      => $image
                                            ));
    
                        echo "<script>alert('تم إضافة معلوماتك بنجاح ');</script>";
                        $Location = "mainpage.php";
    
                        redirectHome($Location);
                                            
                    
                }

    } 
}
include ("include/footer-admin.php");?>
<script>
    var btnUpload = $("#uploadss_file"),
btnOuter = $(".button_outer");
btnUpload.on("change", function(e){
var ext = btnUpload.val().split('.').pop().toLowerCase();
if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
    $(".error_msg").text("Not an Image...");
} else {
    $(".error_msg").text("");
    btnOuter.addClass("file_uploading");
    setTimeout(function(){
        btnOuter.addClass("file_uploaded");
    },3000);
    var uploadedFile = URL.createObjectURL(e.target.files[0]);
    setTimeout(function(){
        $("#uploaded_view").append('<img  src="'+uploadedFile+'" />').addClass("show");
    },3500);
}
});
$(".file_remove").on("click", function(e){
$("#uploaded_view").removeClass("show");
$("#uploaded_view").find("img").remove();
btnOuter.removeClass("file_uploading");
btnOuter.removeClass("file_uploaded");
});
</script>
<?php
 }else {

    header('Location: index.php');

    exit();
}

 
?>