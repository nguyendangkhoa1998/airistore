<!-- List all categories and their second level subcategories -->
<div class="block block-list block-categories">
   
<div id="leftnav" class="block-content" style="display:block">
    <?php $helper = $this->helper('catalog/category') ?>
    <?php $categories = $this->getStoreCategories() ?>
    <?php if (count($categories) > 0): ?>
        <ul id="leftnav-tree" class="level0">
            <?php $i=0; foreach($categories as $category): ?>												<?php 					$class_brand = "";					if($category->getLevel()==2){						$_category=Mage::getModel('catalog/category')->load($category->getId());						$brand_id=explode(',',$_category->getBrands());						if($_category->getBrands()){							$class_brand='has-brands';						}					}				?>
                <li class="level0<?php if ($this->isCategoryActive($category)): ?> active<?php endif; ?> <?php echo $class_brand ?>">
                    <a href="<?php echo $helper->getCategoryUrl($category) ?>"><span><?php echo $this->escapeHtml($category->getName()) ?></span></a>
                    <?php //if ($this->isCategoryActive($category)): ?>
                        <?php $i++; $subcategories = $category->getChildren() ?>
                        <?php if($subcategories->count()) : ?>
							
						<?php // if($subcategories->count()) : ?>
						
						<?php // endif; ?>
						<div class="subcategory-wrapper">
							<div class="left_main_menu">
								<ul id="leftnav-tree-<?php echo $category->getId() ?>" class="level1 toggle-content">

									<!-- Os Column Item  -->
									<?php
									 $CurrentCategory = Mage::getModel('catalog/category')->load($category->getId());
									 $ColumnItems = $CurrentCategory->getColumnItems();
									 ?>
									 <!-- Os End Column Item  -->

									<?php $y=0; foreach($subcategories as $subcategory):  ?>
										<?php $y++; ?>
										<li class="level1<?php if ($this->isCategoryActive($subcategory)): ?> active<?php endif; ?>">
											<a href="<?php echo $helper->getCategoryUrl($subcategory) ?>"><?php echo $this->escapeHtml(trim($subcategory->getName(), '- ')) ?></a>
											 <?php $secondLevelSubcategories = $subcategory->getChildren() ?>
											 <?php  if($secondLevelSubcategories->count()) : ?>
													<div class="toggle-title level1 fa fa-angle-right"></div>
												<?php  endif; ?>
										   <?php if($secondLevelSubcategories->count()) : ?>
												<ul id="leftnav-tree-<?php echo $subcategory->getId() ?>" class="level2 toggle-content">
													<?php foreach($secondLevelSubcategories as $secondLevelSubcategory ): ?>
														<li class="level2<?php if ($this->isCategoryActive($secondLevelSubcategory )): ?> active<?php endif; ?>">
															<a href="<?php echo $helper->getCategoryUrl($secondLevelSubcategory ) ?>"><?php echo $this->escapeHtml(trim($secondLevelSubcategory ->getName(), '- ')) ?></a>
															<span class="split">-</span>
														</li>
														<?php endforeach; ?>
												</ul>
												<?php endif; ?>
										</li>
										<!-- Os Column Item  -->
										<?php if($ColumnItems){
											$column=(int)$ColumnItems;
										 ?>
											<?php  if($y%$column==0) { ?> 
												</ul>
												
												<ul id="leftnav-tree-<?php echo $category->getId() ?>" class="level1 toggle-content">
											<?php } ?>
										<?php } ?>
										<!-- Os End Column Item  -->
									<?php endforeach; ?>
								</ul>
							</div>
							
							<?php if($category->getLevel()==2 && $_category->getBrands()) { ?>
								<div class="brands">
									<div class="title"><p><?php echo $this->__('Brands'); ?></p></div>
									<ul>									
									<?php foreach ( $brand_id as $Idbrandmenu ) { ?>										
										<?php 
											$brand_menu = Mage::getModel( 'ambrands/brand' )->load( $Idbrandmenu );
											$brandImg   = $brand_menu->getImageUrl();										
											$brandName  = Mage::helper( 'core' )->escapeHtml( $brand_menu->getName() );
											$brandUrl   = $brand_menu->getUrl(); 
										?>
										<li>
										<a href="<?php echo $brandUrl ?>" target="_blank"><img src="<?php echo $brandImg ?>" alt="<?php echo $brandName ?>" /></a>										
										</li>
									<?php } ?>
									</ul>
								</div>
							<?php } ?>
						</div>																					
                        <?php endif; ?>
                    <?php //endif; ?>
                </li>
            <?php endforeach; ?>
			<?php //echo $this->getLayout()->createBlock('cms/block')->setBlockId('offerte')->toHtml(); ?> 
        </ul>
        <script type="text/javascript">decorateList('leftnav-tree', 'recursive')</script>
    <?php endif; ?>
</div>
</div>




<?php /* <script>
	jQuery('.toggle-content').hide();
	 jQuery(function() {
		if(jQuery('#leftnav-tree li.level0').hasClass('active')){
			jQuery('#leftnav-tree li.level0.active').find('.toggle-title.level0.fa').removeClass('fa-angle-right').addClass('fa-angle-down');
			jQuery('#leftnav-tree li.level0.active').find('.toggle-content.level1').show();
		}
		 if(jQuery('#leftnav-tree li.level1').hasClass('active')){
			jQuery('#leftnav-tree li.level1.active').find('.level1.toggle-title.fa').removeClass('fa-angle-right').addClass('fa-angle-down');
			jQuery('#leftnav-tree li.level1.active').find('.toggle-content.level2').show();
		}
		
		jQuery(".toggle-title").hover(function(event){
			var  test = jQuery('.toggle-title .fa');
			if(jQuery(this).hasClass('fa-angle-right')) {       
				jQuery(this).removeClass('fa-angle-right').addClass('fa-angle-down');
			}
			else{
				jQuery(this).removeClass('fa-angle-down').addClass('fa-angle-right');
			}
			event.preventDefault();
			jQuery(this).toggleClass('active');
			jQuery(this).next('.toggle-content').slideToggle();
		  });
		
	});
</script> */ ?>