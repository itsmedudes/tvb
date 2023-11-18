<!DOCTYPE html>
<html lang="en">


<head>
<meta charset="utf-8" />
<title><?=$title?></title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content name="description" />
<meta content name="author" />

<link href="<?=base_url()?>assets/admin/css/vendor.min.css" rel="stylesheet" />
<link href="<?=base_url()?>assets/admin/css/default/app.min.css" rel="stylesheet" />

</head>
<body class="pace-top">

<div id="loader" class="app-loader">
<span class="spinner"></span>
</div>


<div id="app" class="app">

<div class="login login-v1">

<div class="login-container">

<div class="login-header">
<div class="brand">
<div class="d-flex align-items-center">
<span class="logo"></span> <b class="me-1"><?=$website_name?></b> Admin
</div>

</div>
<!-- <div class="icon">
<i class="fa fa-lock"></i>
</div> -->
</div>


<div class="login-body">

<div class="login-content fs-13px">
<form  method="post">
<div class="form-floating mb-20px">
<input type="text" class="form-control fs-13px h-45px" = placeholder="Username" name="username"  />
<label for="Username" class="d-flex align-items-center">Username</label>
</div>
<div class="form-floating mb-20px">
<input type="password" class="form-control fs-13px h-45px" id="password" placeholder="Password" name="password" />
<label for="password" class="d-flex align-items-center">Password</label>
</div>
<!-- <div class="form-check mb-20px">
<input class="form-check-input" type="checkbox" value id="rememberMe" />
<label class="form-check-label" for="rememberMe">
Remember Me
</label>
</div> -->
<div class="login-buttons">
<button type="submit" class="btn btn-theme h-45px d-block w-100 btn-lg">Login</button>
</div>
</form>
</div>

</div>

</div>

</div>





<a href="javascript:;" class="btn btn-icon btn-circle btn-theme btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

</div>


<script src="<?=base_url()?>assets/admin/js/vendor.min.js" ></script>
<script src="<?=base_url()?>assets/admin/js/app.min.js" ></script>



 <script src="<?=base_url()?>assets/admin/js/rocket-loader.min.js" data-cf-settings="d1f0805ccdeb1c3d36f9a679-|49" defer=""></script>
</body>


</html>