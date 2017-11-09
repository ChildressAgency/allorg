  <div class="container">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if(function_exists('bcn_display')){
        bcn_display();
      } ?>
    </div>
    <div class="print-share">
      <a href="#" onclick="window.print();"><i class="fa fa-print"></i></a>
      <?php if(function_exists('ADDTOANY_SHARE_SAVE_KIT')){
        ADDTOANY_SHARE_SAVE_KIT(array('use_current_page' => true));
      } ?>
      <?php if(function_exists('ADDTOANY_SHARE_SAVE_KIT')){
        ADDTOANY_SHARE_SAVE_KIT(array('buttons' => array('email')));
      } ?>
    </div>
  </div>