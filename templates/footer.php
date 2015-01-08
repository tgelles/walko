<footer class="content-info" role="contentinfo">

<?php if( is_home() || is_front_page() ) : ?>
 <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
	<?php else : ?>
<div class="footer">
 <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
<div class="row">
                <div class="col-lg-12">
                	  <p class="copyright text-muted small">Copyright &copy; Kevin Walko 2015. All Rights Reserved</p>
                  
                </div>
            </div>
 
    </div>
  </div>
  <?php endif; ?>
</footer>