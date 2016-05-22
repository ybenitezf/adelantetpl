<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

 /** <ul class="latestnews<?php echo $moduleclass_sfx; ?>">
 * <?php foreach ($list as $item) :  ?>
 *	<li itemscope itemtype="https://schema.org/Article">
 *		<a href="<?php echo $item->link; ?>" itemprop="url">
 *			<span itemprop="name">
 *				<?php echo $item->title; ?>
 *			</span>
 *		</a>
 *	</li>
 * <?php endforeach; ?>
 * </ul> */
 // echo (!$tiene_imagen) ? 'fa fa-angle-double-right' : '';

defined('_JEXEC') or die;

?>
<ul class="nav latestnews<?php echo $moduleclass_sfx; ?>">
<?php foreach ($list as $item) :  ?>
	<?php $images = json_decode($item->images); ?>
	<?php $tiene_imagen = (isset($images->image_intro) && !empty($images->image_intro)); ?>
	<li itemscope="" itemtype="https://schema.org/Article">
		<a itemprop="url" href="<?php echo $item->link; ?>">
			<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>
							<img class="mini-img" src="<?php echo htmlspecialchars($images->image_intro); ?>"
								   alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"
									 />
			<?php endif; ?>
			<span itemprop="name">
		  	<span class="fa fa-angle-double-right"></span> <?php echo $item->title; ?>
		  </span>
		</a>
	</li>
<?php endforeach; ?>
</ul>
