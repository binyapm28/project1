<?php
/**
 * @version   1.2 August 21, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
 ?>
						<?php global $gantry; ?>
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
				<?php /** Begin Footer **/ if ($gantry->countModules('footer')) : ?>
				<div id="rt-footer">
					<?php if ($gantry->get('footerwidth') == 'full'): ?>
					<div class="rt-container">
					<?php endif; ?>
						<?php echo $gantry->displayModules('footer','standard','standard'); ?>
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