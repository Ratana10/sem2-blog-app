 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">


   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="../source/images/logo/kolap.png" class="img-circle elevation-2 bg-white " alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block">Kolap Website</a>
       </div>
     </div>

     <?php
      $currentPage = basename($_SERVER['SCRIPT_NAME']); // Get current page filename
      ?>
     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item">
           <a href="./index.php" class="nav-link <?php if ($currentPage === 'index.php') echo 'active' ?>">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="./posts.php" class="nav-link <?php if ($currentPage === 'posts.php') echo 'active' ?>">
             <i class="nav-icon fas fa-th"></i>
             <p>
               Post
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="./users.php" class="nav-link <?php if ($currentPage === 'users.php') echo 'active' ?>">
             <i class="nav-icon fas fa-th"></i>
             <p>
               User
             </p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>