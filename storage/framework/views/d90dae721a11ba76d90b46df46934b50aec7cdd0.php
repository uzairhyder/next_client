<section class="video-inner-modal-section">

    <div class="modal fade" id="videoModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">

                <div class="modal-body">

                    
                <button type="button" class="close-video" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>

                    <div class="video-box-div">

                        <video controls="" width="100%" class="for-pause-video" id="video">
                            <source src="<?php echo e(url('public/video',$video_section->video)); ?>" type="video/mp4">
                        </video>
                        <!-- <iframe src="https://player.vimeo.com/video/137857207" title="Vimeo video" allowfullscreen></iframe> -->

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>
<?php /**PATH E:\xampp\htdocs\next_client_code\resources\views/frontend/common/video.blade.php ENDPATH**/ ?>