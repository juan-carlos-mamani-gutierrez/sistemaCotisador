 <div id="sidebar" class="sidebar">
   <!-- begin sidebar scrollbar -->
   <div data-scrollbar="true" data-height="100%">
     <!-- begin sidebar user -->
     <ul class="nav">
       <li class="nav-profile">
         <a href="javascript:;" data-toggle="nav-profile">
           <div class="cover with-shadow"></div>
           <div class="image">
             <img src="..\assets\img\user\user-13.jpeg" alt="">
           </div>
           <div class="info">
             <b class="caret pull-right"></b>
             <?php echo $_SESSION['usu_nom']; ?>
             <small>Comercial</small>
           </div>
         </a>
       </li>
       <li>
         <ul class="nav nav-profile">
           <li><a href="javascript:;"><i class="fa fa-cog"></i> Perfil </a></li>
           <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Enviar Comentarios </a></li>
           <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Ayuda </a></li>
         </ul>
       </li>
     </ul>

     <ul class="nav">
       <li class="nav-header">Menu</li>
       <li class="has-sub">
         <a href="javascript:;">
           <i class="fa fa-th-large"></i>
           <span>Dashboard</span>
         </a>
       </li>


       <li class="has-sub">
         <a href="javascript:;">
           <b class="caret"></b>
           <!-- <i class="fa fa-gem"></i> -->
           <i class="fa fa-list-ol"></i>
           <span> Mantenimiento </span>
         </a>
         <ul class="sub-menu">
           <li><a href="ui_typography.html">Cliente</a></li>
           <li><a href="ui_typography.html">Contacto</a></li>
           <li><a href="ui_typography.html">Categoria</a></li>
           <li><a href="ui_typography.html">Producto</a></li>
           <li><a href="ui_typography.html">Empresa</a></li>
           <li><a href="ui_typography.html">Usuario</a></li>
         </ul>
       </li>

       <li class="has-sub">
         <a href="javascript:;">
           <b class="caret"></b>
           <i class="fa fa-gem"></i>
           <span> Cotizacion </span>
         </a>
         <ul class="sub-menu">
           <li><a href="ui_typography.html">Nueva Cotizacion </a></li>
           <li><a href="ui_typography.html">Listado Cotizacion </a></li>
         </ul>
       </li>
       <!-- begin sidebar minify button -->
       <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
       <!-- end sidebar minify button -->
     </ul>
     <!-- end sidebar nav -->
   </div>
   <!-- end sidebar scrollbar -->
 </div>
 <div class="sidebar-bg"></div>