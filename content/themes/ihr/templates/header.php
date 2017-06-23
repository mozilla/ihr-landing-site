<header class="banner">
  <div class="container">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <nav class="nav-primary">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container' => '']);
      endif;
      ?>
    </nav>

    <?php
    // insert wpml dropdown here
    /*
    <div class="header__lang-menu lang-menu">
      <a class="lang-menu__link lang-menu__inactive js-lang-menu is-open" href="/">English</a>
      <ul class="lang-menu__options">
        <li class="lang-menu__option"><a class="lang-menu__link lang-menu__active" href="/fr/">Français</a></li>
        <li class="lang-menu__option"><a class="lang-menu__link lang-menu__active" href="/es/">Español</a></li>
        <li class="lang-menu__option"><a class="lang-menu__link lang-menu__active" href="/de/">Deutsch</a></li>
      </ul>
    </div>
    */ ?>

  </div>
</header>
