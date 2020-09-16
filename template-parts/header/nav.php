<?php
/**
 * Navigation
 * 
 * @package cgr-awpt
 */
// Singleton - only instantiated once.
$menu_class = \CGR_AWPT\Inc\Menus::get_instance();
// get the menu ID
$header_menu_id = $menu_class->get_menu_id( 'cgr-awpt-header-menu' );
// get the header menu as [] each item is object(WP_Post)
$header_menus = wp_get_nav_menu_items($menu = $header_menu_id, $args=[]);
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    
    <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo()) {
        the_custom_logo();
      } else {
        echo '<a class="navbar-brand" href="#">Navbar</a>';
      } ?>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php if ( ! empty($header_menus) && is_array($header_menus) ) { ?>

        <ul class="navbar-nav mr-auto">
          <?php
            // loop through all items in headermenu array
            foreach ($header_menus as $menu_item) {
              // IF this menu item is parent. ie @ top level of nav -- in other words ignore child menus in this loop
              if( ! $menu_item->menu_item_parent ) { 
                // get child menu items of this current menu_item
                $child_menu_items = $menu_class->get_child_menu_items( $header_menus, $menu_item->ID );
                // does $child_menu_items have children
                $has_children = !empty($child_menu_items) && is_array($child_menu_items);
                // print_r($has_children);
                if(!$has_children) {
                  ?>
                    <li class="nav-item active">
                      <a class="nav-link" href="<?php echo esc_url($menu_item->url); ?>">
                        <?php echo esc_html( $menu_item->title ); ?>
                        <span class="sr-only">(current)</span>
                      </a>
                    </li>
                  <?php
                } else {
                  ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="<?php echo esc_url( $menu_item->url ); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo esc_html( $menu_item->title ); ?>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($child_menu_items as $child_menu_item) { ?>
                          <a class="dropdown-item" href="<?php echo esc_url( $child_menu_item->url) ?>">
                            <?php echo esc_html( $child_menu_item->title) ?>
                          </a>
                        <?php } ?>
                      </div>
                    </li>
                  <?php
                }
              }
            }
          ?>
        </ul>

      <?php } // endif ?>
    
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<?php
/*
 <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
*/