 <div id="header" class="header navbar-default">
   <!-- begin navbar-header -->
   <div class="navbar-header">
     <a href="index-1.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Color</b> Admin</a>
     <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
   </div>
   <!-- end navbar-header -->
   <!-- begin header-nav -->
   <ul class="navbar-nav navbar-right">
     <li class="navbar-form">

     </li>
     <li class="dropdown">

     </li>
     <li class="dropdown navbar-user">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         <img src="..\..\assets\img\user\user-13.jpeg" alt="">
         <span class="d-none d-md-inline"><?php echo $_SESSION['usu_nom']; ?></span> <b class="caret"></b>
       </a>
       <div class="dropdown-menu dropdown-menu-right">
         <a href="javascript:;" class="dropdown-item">Perfil</a>
         <a href="javascript:;" class="dropdown-item">Calendar</a>
         <div class="dropdown-divider"></div>
         <a href="../Logout/logout.php" class="dropdown-item">Cerrar Sesion</a>
       </div>
     </li>
   </ul>
   <!-- end header-nav -->
 </div>