<div class="casino" >
    <h1>COMMENTAIRES DES CLIENTS</h1>
    <div class="row casino-content" >
        <div class="col-md-3 casino-details" >
            <div class="casino-image" >
                <div class="casino-image-frame" ></div>
                <div class="casino-image-logo" style="background-image:url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>)" ></div>
            </div>
            <div class="casino-title" ><?php the_title(); ?></div>
            <div class="casino-review-score" ><?php echo $review_score; ?></div>
            <div class="casino-review-count" ><?php echo $review_count; ?> Avis des clients</div>
            <div class="casino-review-stars" ></div>
            <div class="casino-review-details" >
                <div class="casino-review-details-item" >
                    <div class="casino-review-details-item-star" >5 <i class="fa fa-star" aria-hidden="true"></i></div>
                    <div class="casino-review-details-item-value" >
                        <div class="progress-bar progress-bar-success" role="progressbar" style="width:67%">
                            67%
                        </div>
                    </div>
                </div>
                <div class="casino-review-details-item" >
                    <div class="casino-review-details-item-star" >4 <i class="fa fa-star" aria-hidden="true"></i></div>
                    <div class="casino-review-details-item-value" >
                        <div class="progress-bar progress-bar-info" role="progressbar" style="width:67%">
                            67%
                        </div>
                    </div>
                </div>
                <div class="casino-review-details-item" >
                    <div class="casino-review-details-item-star" >3 <i class="fa fa-star" aria-hidden="true"></i></div>
                    <div class="casino-review-details-item-value" >
                        <div class="progress-bar progress-bar-warning" role="progressbar" style="width:67%">
                            67%
                        </div>
                    </div>
                </div>
                <div class="casino-review-details-item" >
                    <div class="casino-review-details-item-star" >2 <i class="fa fa-star" aria-hidden="true"></i></div>
                    <div class="casino-review-details-item-value" >
                        <div class="progress-bar progress-bar-warning" role="progressbar" style="width:67%">
                            67%
                        </div>
                    </div>
                </div>
                <div class="casino-review-details-item" >
                    <div class="casino-review-details-item-star" >1 <i class="fa fa-star" aria-hidden="true"></i></div>
                    <div class="casino-review-details-item-value" >
                        <div class="progress-bar progress-bar-danger" role="progressbar" style="width:67%">
                            67%
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 casino-reviews" ></div>
    </div>
</div>