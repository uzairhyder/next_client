<style>
    .innerBosStar {
        font-size: 18px;
        margin-bottom: 16px;
    }
</style>

<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 customer-description">

        <div>
            <h6 id="name"><?php echo e($customer->name); ?></h6>
            <p><?php echo e($customer->email ?? ''); ?></p>
            <?php if($customer->customer_rating): ?>
                <div class="innerBosStar">
                    <p><?php echo e($customer->ques_customer_rating); ?></p>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                </div>
            <?php endif; ?>
            <?php if($customer->customer_rating_2): ?>
                <div class="innerBosStar">
                    <p><?php echo e($customer->ques_customer_rating_2); ?></p>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                </div>
            <?php endif; ?>
            <?php if($customer->customer_rating_3): ?>
                <div class="innerBosStar">
                    <p><?php echo e($customer->ques_customer_rating_3); ?></p>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star"></i>
                    <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                </div>
            <?php endif; ?>
            <p><?php echo e($customer->address); ?></p>
            <p><?php echo e($customer->contact); ?></p>
        </div>
    </div>
    <div class="col-lg-12 col-sm-12 col-md-12 customer-description">
        <?php if($customer->working_with_customer): ?>
            <h6><?php echo e($customer->ques_customer_work_1); ?></h6>
            <h6> <?php echo e($customer->working_with_customer); ?>

            </h6>
        <?php endif; ?>
        <?php if($customer->customer_work_2): ?>
            <h6><?php echo e($customer->ques_customer_work_2); ?></h6>
            <h6> <?php echo e($customer->customer_work_2); ?>

            </h6>
        <?php endif; ?>
        <?php if($customer->customer_work_3): ?>
            <h6><?php echo e($customer->ques_customer_work_3); ?></h6>
            <h6> <?php echo e($customer->customer_work_3); ?>

            </h6>
        <?php endif; ?>
        <?php if($customer->customer_pay_time): ?>
            <h6><?php echo e($customer->ques_customer_pay_time_1); ?></h6>
            <h6> <?php echo e($customer->customer_pay_time); ?>

            </h6>
        <?php endif; ?>
        <?php if($customer->customer_pay_time_2): ?>
            <h6><?php echo e($customer->ques_customer_pay_time_2); ?></h6>
            <h6> <?php echo e($customer->customer_pay_time_2); ?>

            </h6>
        <?php endif; ?>
        <?php if($customer->customer_pay_time_3): ?>
            <h6><?php echo e($customer->ques_customer_pay_time_3); ?></h6>
            <h6> <?php echo e($customer->customer_pay_time_3); ?>

            </h6>
        <?php endif; ?>
        <?php if($customer->customer_recommendation): ?>
            <h6><?php echo e($customer->ques_customer_recommendation_1); ?></h6>
            <h6> <?php echo e($customer->customer_recommendation); ?>

            </h6>
        <?php endif; ?>
        <?php if($customer->customer_recommendation_2): ?>
            <h6><?php echo e($customer->ques_customer_recommendation_2); ?></h6>
            <h6> <?php echo e($customer->customer_recommendation_2); ?>

            </h6>
        <?php endif; ?>
        <?php if($customer->customer_recommendation_3): ?>
            <h6><?php echo e($customer->ques_customer_recommendation_3); ?></h6>
            <h6> <?php echo e($customer->customer_recommendation_3); ?>

            </h6>
        <?php endif; ?>
        <?php if($customer->customer_description): ?>
            <p><?php echo e($customer->ques_customer_description_1); ?></p>
            <p><?php echo e($customer->customer_description ?? ''); ?></p>
        <?php endif; ?>
        <?php if($customer->customer_description_2): ?>
            <p><?php echo e($customer->ques_customer_description_2); ?></p>
            <p><?php echo e($customer->customer_description_2 ?? ''); ?></p>
        <?php endif; ?>
        <?php if($customer->customer_description_3): ?>
            <p><?php echo e($customer->ques_customer_description_3); ?></p>
            <p><?php echo e($customer->customer_description_3 ?? ''); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v2/resources/views/frontend/random_search_results_view.blade.php ENDPATH**/ ?>