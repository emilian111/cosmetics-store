<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
<div class="user-panel">
        
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><?php echo $_SESSION['email_admin'] ?></li>
        <li class="active treeview">
     <li>
          <a href="adminindex.php">
            <i class="fa fa-th"></i> <span>Home</span>
            
          </a>
        </li>
        <li>
          <a href="categories.php">
            <i class="fa fa-th"></i> <span>Category</span>
            
          </a>
        </li>
         <li>
          <a href="productsshow.php">
            <i class="fa fa-th"></i> <span>Products</span>
            
          </a>
        </li>
        <li>
          <a href="orders.php">
            <i class="fa fa-th"></i> <span>Orders</span>
            
          </a>
        </li>
        <li>
          <a  href="Blog/Dashboard.php">
            <i class="fa fa-th"></i> <span>Blog</span>
            
          </a>
        </li>
        
        
        <li>
          <a href="adminpartials/logout.php">
            <i class="fa fa-th"></i> <span>Sign Out</span>
            
          </a>
        </li>
        
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>