
<?php include('layouts/header.php'); ?>

<section class="section">
    <?php include('layouts/navbar.php'); ?>
    <!-- END nav -->
    <div class="container">

        <div class="card" >
            <h5 class="card-title"><?php echo $article['title'] ;?></h5>
            <img src="<?php echo \App\Helpers\Helper::getBaseUrl().$article['img']?>" class="card-img-top"  alt="...">
            <div class="card-body">
                <p class="card-text"><?php echo $article['content'] ;?></p>
                <p class="card-text"><small class="text-muted">Author: <?php echo $article['username'] ?></small>  <small class="text-muted create-at">Created At : <?php echo \App\Helpers\Helper::dateFormat($article['create_at']) ?> <br> <?php echo \App\Helpers\Helper::timeDifference($article['create_at'])?></small></p>
            </div>
        </div>


        <div class="card" >
            <h5 class="card-title">Comments : </h5>
            <div class="card-body">
                <?php if(!empty($comments)){
                    foreach ($comments as $comment){
                        echo'<div class="container text-dark" id="comment_'.$comment['id'].'">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-12 col-lg-10 col-xl-11">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex flex-start">
                                                    <div class="w-100">
                                                        <div class="d-flex justify-content-between align-items-center mb-3 updateCommentShow">
                                                            <h6 class="text-primary fw-bold mb-0">
                                                            <span class="text-primary">' .$comment['username'].'</span>
                                                                <span class="text-dark ms-2" id="showComment_' .$comment['id'].'">' .$comment['text'].' </span>
                                                            </h6>
                                                            <p class="mb-0">'.\App\Helpers\Helper::timeDifference($comment['create_at']).'</p>
                                                        </div>';

                                                         if(isset($_SESSION['user_id'])) {
                                                             echo '<div class="card-footer py-3 border-0 updateCommentInput" style="background-color: #f8f9fa;display: none" >
                                                                <div class="d-flex flex-start w-100">
                                                                    <div class="form-outline w-100">
                                                                         <textarea class="form-control" id="editContant" rows="4" style="background: #fff;" name="comment">' . $comment['text'] . '</textarea>
                                                                        <label class="form-label" for="textAreaExample">comment</label>
                                                                    </div>
                                                                </div>
                                                                <div class="float-end mt-2 pt-1">
                                                                    <button type="button" onclick="editComment(' . $comment['id'] . ')" class="btn btn-primary btn-sm" >update</button>
                                                                </div>
                                                            </div>';
                                                         }
                                                        if(isset($_SESSION['user_id']) && ($comment['user_id'] == $_SESSION['user_id'])) {
                                                            echo '<div class="d-flex justify-content-between align-items-center updateCommentShow" >
                                                                    <p class="small mb-0" style="color: #aaa;">
                                                                        <button  class="link-grey btn-danger "  onclick="deleteComment(' . $comment['id'] . ')">Remove</button> •
                                                                        <button  class="link-grey btn-info" onclick="showUpdateFormComment(' . $comment['id'] . ')">edit</button> •
                                                                    </p>
                                                                </div>';
                                                        }
                                                  echo'</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>';
                    }
                }?>
                <?php if(isset($_SESSION['user_id'])){ ?>
                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                        <div class="d-flex flex-start w-100">
                            <div class="form-outline w-100">
                                 <textarea class="form-control" id="commentContant" rows="4" style="background: #fff;" name="comment"></textarea>
                                <label class="form-label" for="textAreaExample">comment</label>
                            </div>
                        </div>
                        <div class="float-end mt-2 pt-1">
                            <button type="button" onclick="addComment(<?php echo $article['id'] ;?>)" class="btn btn-primary btn-sm" >Save</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>




    </div>
</section>

<script>
        function deleteComment(id) {
            console.log(id);
            $.ajax({
                url: <?php echo "'".\App\Helpers\Helper::getBaseUrl().'/comment/delete'."'"; ?>,
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(response) {
                    // Handle the response from the server
                    if (response.success) {
                        document.getElementById("comment_"+id).remove();
                    } else {
                        alert('Error deleting comment: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed. Status: ' + status + ', Error: ' + error);
                }
            });
        }

        function addComment(id) {
           var comment =  document.getElementById("commentContant").value;
            console.log(comment);

            $.ajax({
                url: <?php echo "'".\App\Helpers\Helper::getBaseUrl().'/comment/add'."'"; ?>,
                type: 'POST',
                dataType: 'json',
                data: {
                    article_id: id,
                    text:comment
                },
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert('Error deleting comment: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed. Status: ' + status + ', Error: ' + error);
                }
            });
        }

        function showUpdateFormComment(id) {
            $(".updateCommentInput").show();
            $(".updateCommentShow").hide();

        }
        function editComment(id) {
            var comment =  document.getElementById("editContant").value;

            $.ajax({
                url: <?php echo "'".\App\Helpers\Helper::getBaseUrl().'/comment/edit'."'"; ?>,
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    text:comment
                },
                success: function(response) {
                    // Handle the response from the server
                    if (response.success) {
                        $(".updateCommentInput").hide();
                        document.getElementById("showComment_"+id).innerHTML = comment;
                    } else {
                        alert('Error edit comment: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed. Status: ' + status + ', Error: ' + error);
                }
            });
        }
</script>

<?php include('layouts/footer.php'); ?>

