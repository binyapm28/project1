<?php
/**
 * @version   1.2 August 21, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $gantry->language; ?>" lang="<?php echo $gantry->language;?>" >
<head>
	<?php
		$gantry->displayHead();
		$gantry->addStyles(array('template.css','wordpress.css','wp.css','overlays.css','typography.css','customisation.css'));
		if (!$gantry->get('rotator-enabled')) {
			$gantry->addInlineScript("
				window.addEvent('domready', function() {
					var content = $$('#rt-rotator .rotator-desc'), overlay = $$('.rotator-overlay');
					if (!content.length) { if (overlay.length) overlay.setStyle('display', 'none'); } 
				});
			");
		}

		if ($gantry->get('articledetails') == 'layout3' && $gantry->browser->engine == 'trident') $gantry->addScript('gantry-ie-zindex.js');
	?>
</head>
	<body <?php echo $gantry->displayBodyTag(array('backgroundLevel','bodyLevel')); ?>>
		<?php /** Begin Drawer **/ if ($gantry->countModules('drawer')) : ?>
		<div id="rt-drawer">
			<div class="rt-container">
				<?php echo $gantry->displayModules('drawer','standard','standard'); ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php /** End Drawer **/ endif; ?>
		<?php if ($gantry->get('headerwidth') == 'wrapped'): ?>
		<div class="rt-container">
			<div class="rt-wrapped"><div class="rt-wrapped2"><div class="rt-wrapped3"><div class="rt-wrapped4">
			<?php endif; ?>
				<div id="rt-header-surround" <?php echo $gantry->displayClassesByTag('rt-header-surround'); ?>>
					<?php /** Begin Top **/ if ($gantry->countModules('top')) : ?>
					<div id="rt-top">
						<?php if ($gantry->get('headerwidth') == 'full'): ?>
						<div class="rt-container">
						<?php endif; ?>
							<?php echo $gantry->displayModules('top','standard','standard'); ?>
							<div class="clear"></div>
						<?php if ($gantry->get('headerwidth') == 'full'): ?>
						</div>
						<?php endif; ?>
					</div>
					<?php /** End Top **/ endif; ?>
					<?php /** Begin Header **/ if ($gantry->countModules('header')) : ?>
					<div id="rt-header"><div id="rt-header2">
						<?php if ($gantry->get('headerwidth') == 'full'): ?>
						<div class="rt-container">
						<?php endif; ?>
							<?php echo $gantry->displayModules('header','standard','standard'); ?>
							<div class="clear"></div>
						<?php if ($gantry->get('headerwidth') == 'full'): ?>
						</div>
						<?php endif; ?>
					</div></div>
					<?php /** End Header **/ endif; ?>
					<?php /** Begin Navigation **/ if ($gantry->countModules('navigation')) : ?>
					<div id="rt-navigation">
						<?php if ($gantry->get('headerwidth') == 'full'): ?>
						<div class="rt-container">
						<?php endif; ?>
							<?php echo $gantry->displayModules('navigation','basic','basic'); ?>
					    	<div class="clear"></div>
						<?php if ($gantry->get('headerwidth') == 'full'): ?>
						</div>
						<?php endif; ?>
					</div>
					<?php /** End Navigation **/ endif; ?>
				</div>
				<?php /** Begin Rotator **/ if ($gantry->countModules('rotator')) : ?>
				<div id="rt-rotator" <?php echo $gantry->displayClassesByTag('rt-body-surround'); ?>><div id="rt-rotator-bg"></div><div id="rt-rotator2"><div class="rotator-overlay"></div>
					<?php if ($gantry->get('headerwidth') == 'full'): ?>
					<div class="rt-container">
					<?php endif; ?>
						<div class="rt-grid-12 rt-alpha rt-omega">
							<?php echo $gantry->displayModules('rotator','basic','basic'); ?>
						</div>
					<?php if ($gantry->get('headerwidth') == 'full'): ?>
					</div>
					<?php endif; ?>
				</div></div>
				<?php /** End Rotator **/ endif; ?>
			<?php if ($gantry->get('headerwidth') == 'wrapped'): ?>
			</div></div></div></div>
		</div>
		<?php endif; ?>
		<div class="header-<?php echo $gantry->get('headerwidth'); ?>">
			<div id="rt-body-surround" <?php echo $gantry->displayClassesByTag('rt-body-surround'); ?>>
				<div class="rt-container">
					<div id="rt-body-bg" class="header-<?php echo $gantry->get('headerwidth'); ?> footer-<?php echo $gantry->get('footerwidth'); ?>"><div id="rt-body-bg2"><div id="rt-body-bg3"><div id="rt-body-bg4">
						<?php 
							if ($gantry->get('rotator-enabled') && $gantry->get('rotator-controls')):
						?>
						<div id="rotator-controls">
							<div class="rotator-arrow-l"></div>
							<ul class="rotator-pages">
								<li><span>0</span></li>
							</ul>
							<div class="rotator-arrow-r"></div>
						</div>
						<?php endif; ?>
						<?php /** Begin Showcase **/ if ($gantry->countModules('showcase')) : ?>
						<div id="rt-showcase">
							<div class="rt-container">
								<?php echo $gantry->displayModules('showcase','standard','standard'); ?>
								<div class="clear"></div>
							</div>
						</div>
						<?php /** End Showcase **/ endif; ?>
						<?php /** Begin Feature **/ if ($gantry->countModules('feature')) : ?>
						<div id="rt-feature">
							<?php echo $gantry->displayModules('feature','standard','standard'); ?>
							<div class="clear"></div>
						</div>
						<?php /** End Feature **/ endif; ?>
						<?php /** Begin Utility **/ if ($gantry->countModules('utility')) : ?>
						<div id="rt-utility">
							<?php echo $gantry->displayModules('utility','standard','standard'); ?>
							<div class="clear"></div>
						</div>
						<?php /** End Utility **/ endif; ?>
						<?php /** Begin Breadcrumbs **/ if ($gantry->countModules('breadcrumb')) : ?>
						<div id="rt-breadcrumbs">
							<?php echo $gantry->displayModules('breadcrumb','basic','breadcrumbs'); ?>
							<div class="clear"></div>
						</div>
						<?php /** End Breadcrumbs **/ endif; ?>
						<?php /** Begin Main Top **/ if ($gantry->countModules('maintop')) : ?>
						<div id="rt-maintop">
							<?php echo $gantry->displayModules('maintop','standard','standard'); ?>
							<div class="clear"></div>
						</div>
						<?php /** End Main Top **/ endif; ?>
						<?php /** Begin Main Body **/ ?>
					    <?php echo $gantry->displayMainbody('mainbody','sidebar','standard','standard','standard','standard','standard'); ?>
						<?php /** End Main Body **/ ?>
						<?php /** Begin Main Bottom **/ if ($gantry->countModules('mainbottom')) : ?>
						<div id="rt-mainbottom">
							<?php echo $gantry->displayModules('mainbottom','standard','standard'); ?>
							<div class="clear"></div>
						</div>
						<?php /** End Main Bottom **/ endif; ?>
						<?php /** Begin Bottom **/ if ($gantry->countModules('bottom')) : ?>
						<div id="rt-bottom">
							<?php echo $gantry->displayModules('bottom','standard','standard'); ?>
							<div class="clear"></div>
						</div>
						<?php /** End Bottom **/ endif; ?>
					</div></div></div></div>
				</div>
			</div>
		</div>
		<?php if ($gantry->get('footerwidth') == 'wrapped'): ?>
		<div class="rt-container">
			<div class="rt-wrapped"><div class="rt-wrapped2"><div class="rt-wrapped3"><div class="rt-wrapped4">
			<?php endif; ?>
				<div id="rt-footer-surround" <?php echo $gantry->displayClassesByTag('rt-footer-surround'); ?>><div id="rt-footer-surround2">
				<?php /** Begin Footer **/ if ($gantry->countModules('footer-position')) : ?>
				<div id="rt-footer">
					<?php if ($gantry->get('footerwidth') == 'full'): ?>
					<div class="rt-container">
					<?php endif; ?>
						<?php echo $gantry->displayModules('footer-position','standard','standard'); ?>
						<div class="clear"></div>
					<?php if ($gantry->get('footerwidth') == 'full'): ?>
					</div>
					<?php endif; ?>
				</div>
				<?php /** End Footer **/ endif; ?>
				<?php /** Begin Copyright **/ if ($gantry->countModules('copyright')) : ?>
				<div id="rt-copyright">
					<?php if ($gantry->get('footerwidth') == 'full'): ?>
					<div class="rt-container">
					<?php endif; ?>
						<?php echo $gantry->displayModules('copyright','standard','standard'); ?>
						<div class="clear"></div>
					<?php if ($gantry->get('footerwidth') == 'full'): ?>
					</div>
					<?php endif; ?>
				</div>
				<?php /** End Copyright **/ endif; ?>
			</div></div>
		<?php if ($gantry->get('footerwidth') == 'wrapped'): ?>
			</div></div></div></div>
		</div>
		<?php endif; ?>
		<?php /** Begin Debug **/ if ($gantry->countModules('debug')) : ?>
		<div id="rt-debug">
			<?php echo $gantry->displayModules('debug','standard','standard'); ?>
			<div class="clear"></div>
		</div>
		<?php /** End Debug **/ endif; ?>
		<?php /** Begin Analytics **/ if ($gantry->countModules('analytics')) : ?>
		<?php echo $gantry->displayModules('analytics','basic','basic'); ?>
		<?php /** End Analytics **/ endif; ?>
		<?php /** Begin Popup **/ 
		echo $gantry->displayModules('popup','popup','popup'); 
		/** End Popup **/ ?>
		<?php $gantry->displayFooter(); ?>
	</body>
</html>
<?php
$gantry->finalize();
?>