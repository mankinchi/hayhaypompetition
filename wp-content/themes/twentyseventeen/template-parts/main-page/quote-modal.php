<?php
/**
 * Displays sponsor on front page
 *
 * @package WordPress
 * @subpackage myTheme
 * @since 1.0
 * @version 1.0
 */
?>
<div class="row quote-modal page-modal">
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
    		<div class="col-md-12 modal-header">
    			<div class="page-modal-title">Nhà tài trợ</div>
    			<div class="underline"></div>
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-12">
                <div class="row sponsor-container">
                    <div class="divider"></div>
                    <?php
                        $sponsors = get_posts(array(
                            'numberposts' => -1,
                            'post_type' => 'sponsors',
                            'order' => 'ASC'
                        ));

                        if ($sponsors) :
                            foreach ($sponsors as $sponsor) :
                                $fields = get_fields($sponsor->ID);
                                ?>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="row sponsor-block">
                                            <div class="col-md-12 col-xs-4">
                                                <img class="sponsor-image" src="<?php echo $fields["image"] ?>" alt="">
                                            </div>
                                            <div class="col-md-12 col-xs-8">
                                                <div class="row">
                                                    <div class="col-md-12 sponsor-name"><?php echo get_the_title($sponsor->ID); ?></div>
                                                    <div class="col-md-12 sponsor-role"><?php echo $fields["role"] ?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xs-12 sponsor-quote"><?php echo $fields["quote"] ?></div>
                                            <div class="col-xs-12 visible-xs-block visible-sm-block mobile-divider"></div>
                                        </div>
                                    </div>
                            <?php endforeach;
                        endif;
                     ?>
                </div>
    		</div>
    	</div>
    </div>
</div>
<script type="text/javascript">

</script>
