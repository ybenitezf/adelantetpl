<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

JHtml::_('behavior.caption');

// If the page class is defined, add to class as suffix.
// It will be a separate class if the user starts it with a space
?>
<div class="blog-featured<?php echo $this->pageclass_sfx;?>" itemscope itemtype="https://schema.org/Blog">
<?php if ($this->params->get('show_page_heading') != 0) : ?>
<div class="page-header">
	<h1>
	<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
</div>
<?php endif; ?>

<!-- CREAR ROW-FLUID PARA CONTENER LOS ELEMENTOS DE CONTENIDO -->
<div class="row-fluid">
	<div class="span12">
		<!-- Vista al ancho completo que me permiten -->
		<div class="row-fluid">
			<div class="span8">
			  <!-- Articulos más destacados -->
				<?php $leadingcount = 0; ?>
				<?php if (!empty($this->lead_items)) : ?>
				<div class="items-leading clearfix">
					<?php foreach ($this->lead_items as &$item) : ?>
						<div class="leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?> clearfix"
							itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
							<?php
								$this->item = &$item;
								echo $this->loadTemplate('lead');
							?>
						</div>
						<hr class="hr-normal">
						<?php
							$leadingcount++;
						?>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="span4 hidden-phone hidden-tablet otros-destacados">
				<!-- Otros destacados -->
				<?php if (!empty($this->intro_items)) : ?>
					<?php foreach ($this->intro_items as $key => &$item) : ?>
						<div class="item <?php echo $item->state == 0 ? ' system-unpublished' : null; ?>"
							itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
						<?php
								$this->item = &$item;
								echo $this->loadTemplate('item');
						?>
						</div>
						<hr class="hr-mini">
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

</div>
