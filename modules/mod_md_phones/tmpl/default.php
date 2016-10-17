<?php

defined('_JEXEC') or die;
?>


<div class="uk-md-phones uk-md-phones-<?php echo $moduleclass_sfx ?>" >
	<?php if ($textBefore != ''): ?>
	<div class="uk-mb-phones-before uk-text-large uk-text-muted uk-margin-bottom uk-text-right">
		<?php echo $textBefore; ?>
	</div>
	<?php endif;?>
		<?php for ($i = 0; $i < $phoneCount; $i++):?>
			<a class="uk-md-phone-row uk-text-semibold uk-text-contrast uk-position-relative uk-inline-block" href="tel:<?php echo $phoneList->country_code[$i].$phoneList->operator_code[$i].$phoneList->phone_number[$i];?>">
				<span class="uk-phone-icon">
					<?php if ($phoneList->phone_icon[$i] != ''): ?>
						<img src="<?php echo $phoneList->phone_icon[$i];?>" />
					<?php endif;?>
				</span>
				<span class="uk-country-code uk-h3"><?php echo $phoneList->country_code[$i];?></span>
				<span class="uk-operator-code uk-h3"><?php echo $phoneList->operator_code[$i];?></span>
				<span class="uk-phone-number uk-h2"><?php echo $phoneList->phone_number[$i];?></span>
				<span class="uk-note uk-h3"><?php echo $phoneList->note[$i];?></span>
                <?php if ($phoneList->phone_icon[$i] == ''): ?>
					<i class="icon-phone-call uk-h2 uk-position-absolute"></i>
				<?php endif;?>
			</a>
		<?php endfor;?>
	<?php if ($textAfter != ''): ?>
	<div class="uk-mb-phones-before uk-text-large uk-text-muted uk-margin-top uk-text-right">
		<?php echo $textAfter; ?>
	</div>
	<?php endif;?>
</div>
