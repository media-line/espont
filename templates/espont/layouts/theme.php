<?php
/**
* @package   yoo_master2
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));

?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

<head>
<?php echo $this['template']->render('head'); ?>
</head>

<body class="<?php echo $this['config']->get('body_classes'); ?>">


		<?php if ($this['widgets']->count('toolbar-l + toolbar-r')) : ?>
		<div class="tm-toolbar uk-clearfix uk-hidden-small uk-hidden-medium">

			<?php if ($this['widgets']->count('toolbar-l')) : ?>
			<div class="uk-float-left"><?php echo $this['widgets']->render('toolbar-l'); ?></div>
			<?php endif; ?>

			<?php if ($this['widgets']->count('toolbar-r')) : ?>
			<div class="uk-float-right"><?php echo $this['widgets']->render('toolbar-r'); ?></div>
			<?php endif; ?>

		</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('logo + headerbar + menu + search + headerbar-mobile')) : ?>
		<div class="tm-headerbar tm-headerbar-home uk-wrapper uk-position-absolute">
            <div class="uk-grid uk-grid-small">

                <?php if ($this['widgets']->count('logo')) : ?>
                <div class="uk-width-1-5 uk-logo-wrapper">
                    <a class="tm-logo uk-inline-block" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo'); ?></a>
                </div>
                <?php endif; ?>
                
                <?php if ($this['widgets']->count('menu + search + headerbar-mobile')) : ?>
                <nav class="tm-navbar uk-navbar uk-float-left uk-width-4-5 uk-width-large-3-5 uk-width-medium-4-5 uk-width-small-4-5">
                    
                    <?php if ($this['widgets']->count('headerbar-mobile')) : ?>
                        <div class="uk-headerbar-mobile uk-hidden-large uk-float-left uk-text-center">
                            <?php echo $this['widgets']->render('headerbar-mobile'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($this['widgets']->count('menu')) : ?>
                        <?php echo $this['widgets']->render('menu'); ?>
                    <?php endif; ?>

                    <?php if ($this['widgets']->count('offcanvas')) : ?>
                        <a href="#offcanvas" class="uk-navbar-toggle uk-hidden-large" data-uk-offcanvas></a>
                    <?php endif; ?>

                    <?php if ($this['widgets']->count('search')) : ?>
                    <div class="uk-navbar-flip">
                        <div class="uk-navbar-content uk-hidden-medium uk-hidden-small"><?php echo $this['widgets']->render('search'); ?></div>
                    </div>
                    <?php endif; ?>

                    <?php if ($this['widgets']->count('logo-small')) : ?>
                    <div class="uk-navbar-content uk-navbar-center uk-hidden-large"><a class="tm-logo-small" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-small'); ?></a></div>
                    <?php endif; ?>

                </nav>
                <?php endif; ?>
                
                <div class="uk-width-1-5 uk-header-phones uk-hidden-medium uk-hidden-small">
                    <?php echo $this['widgets']->render('headerbar'); ?>
                </div>
            </div>
        </div>
		<?php endif; ?>
        
        <?php 
            if ($this['widgets']->count('home-blocks')) { 
            $homeBlocksCount = $this['widgets']->count('home-blocks');
        ?>
            <div class="uk-columns uk-columns-<?php echo $homeBlocksCount; ?> uk-clearfix uk-cover">
                <?php echo $this['widgets']->render('home-blocks'); ?>
            </div>
        <?php } ?>
        
		<?php if ($this['widgets']->count('top-a')) : ?>
		<section id="tm-top-a" class="<?php echo $grid_classes['top-a']; echo $display_classes['top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-a', array('layout'=>$this['config']->get('grid.top-a.layout'))); ?></section>
		<?php endif; ?>

		<?php if ($this['widgets']->count('top-b')) : ?>
		<section id="tm-top-b" class="<?php echo $grid_classes['top-b']; echo $display_classes['top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-b', array('layout'=>$this['config']->get('grid.top-b.layout'))); ?></section>
		<?php endif; ?>

		<?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
		<div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

			<?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
			<div class="<?php echo $columns['main']['class'] ?>">

				<?php if ($this['widgets']->count('main-top')) : ?>
				<section id="tm-main-top" class="<?php echo $grid_classes['main-top']; echo $display_classes['main-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-top', array('layout'=>$this['config']->get('grid.main-top.layout'))); ?></section>
				<?php endif; ?>

				<?php if ($this['config']->get('system_output', true)) : ?>
				<main id="tm-content" class="tm-content">

					<?php if ($this['widgets']->count('breadcrumbs')) : ?>
					<?php echo $this['widgets']->render('breadcrumbs'); ?>
					<?php endif; ?>

					<?php echo $this['template']->render('content'); ?>

				</main>
				<?php endif; ?>

				<?php if ($this['widgets']->count('main-bottom')) : ?>
				<section id="tm-main-bottom" class="<?php echo $grid_classes['main-bottom']; echo $display_classes['main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?></section>
				<?php endif; ?>

			</div>
			<?php endif; ?>

            <?php foreach($columns as $name => &$column) : ?>
            <?php if ($name != 'main' && $this['widgets']->count($name)) : ?>
            <aside class="<?php echo $column['class'] ?>"><?php echo $this['widgets']->render($name) ?></aside>
            <?php endif ?>
            <?php endforeach ?>

		</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('bottom-a')) : ?>
		<section id="tm-bottom-a" class="<?php echo $grid_classes['bottom-a']; echo $display_classes['bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?></section>
		<?php endif; ?>

		<?php if ($this['widgets']->count('bottom-b')) : ?>
		<section id="tm-bottom-b" class="<?php echo $grid_classes['bottom-b']; echo $display_classes['bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?></section>
		<?php endif; ?>

		<?php if ($this['widgets']->count('footer + debug') || $this['config']->get('warp_branding', true) || $this['config']->get('totop_scroller', true)) : ?>
		<footer id="tm-footer" class="tm-footer tm-footer-home">
            <div class="uk-wrapper uk-position-absolute">
                <div class="uk-grid">
                    
                    <div class="uk-width-1-1 uk-width-large-7-10 uk-width-medium-6-10 uk-width-small-1-1">
                        <div class="uk-site-copyrate uk-text-muted uk-text-left">
                        <?php
                            echo $this['widgets']->render('footer');
                        ?>
                        </div>
                    </div>
                    <div class="uk-width-1-1 uk-width-large-3-10 uk-width-medium-4-10 uk-width-small-1-1">
                        <div class="uk-medialine-copyrate uk-text-muted uk-text-right">
                            <?php if (JURI::current() == JURI::base()){ ?>
                                Разработка сайта - <a class="uk-text-contrast uk-bordered-link" href="http://www.medialine.by" target="_blank">Медиа Лайн</a>
                            <?php } else {?>
                                Разработка сайта - <a class="uk-text-contrast uk-bordered-link" href="http://www.medialine.by" target="_blank" rel="nofollow">Медиа Лайн</a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
                    
		</footer>
		<?php endif; ?>

    <?php if ($this['config']->get('totop_scroller', true)) : ?>
        <a class="tm-totop-scroller" data-uk-smooth-scroll href="#"></a>
    <?php endif; ?>
    <?php
		$this->output('warp_branding');
		echo $this['widgets']->render('debug');
	?>
	<?php echo $this->render('footer'); ?>

	<?php if ($this['widgets']->count('offcanvas')) : ?>
	<div id="offcanvas" class="uk-offcanvas">
        
		<div class="uk-offcanvas-bar">
            <a href="#offcanvas" class="uk-close uk-offcanvas-close" data-uk-offcanvas></a>
            <?php echo $this['widgets']->render('offcanvas'); ?>
        </div>
	</div>
	<?php endif; ?>
    
</body>
</html>