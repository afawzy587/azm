
<?php include('layouts/header.php'); ?>

<section class="section">
    <?php include('layouts/navbar.php'); ?>
    <!-- END nav -->
    <div class="container mt-5">
        <h2>Add Article </h2>
        <div class="card-body">
            <div class="form form-article">
                <?php if(!empty($errors)){ foreach ($errors as $error){ echo '<span>'.$error.'</span>';}}?>
                <form class="login-form " action="<?php echo \App\Helpers\Helper::getBaseUrl().'/article/create'?>" method="post" enctype="multipart/form-data">
                    <h2>SIGN IN TO YOUR ACCOUNT</h2>
                    <input type="text" oninput="return titleValid()"  placeholder="add title" name="title" value="" id="title" autocomplete="off" required />
                    <span id="vaild-title"></span>
                    <label for="image">Choose Image:</label>
                    <input type="file" oninput="return imgValid()" name="img" id="img"  value="" required>
                    <span id="vaild-img"></span>


                    <label for="content">Text:</label>
                    <textarea id="content" name="content" ></textarea>

                    <span id="vaild-content"></span>
                    <button type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function titleValid() {
        var title = document.getElementById("title").value;

        if (title.length < 5) {
            document.getElementById("vaild-title").innerHTML = "Minimum 5 characters";
            return false;
        } else {
            document.getElementById("vaild-title").innerHTML = "";
        }
    }
    function passValid() {
        var file = document.getElementById("file").value;
        if (file.length < 8 ) {
            document.getElementById("vaild-file").innerHTML = "Minimum 8 characters";
            return false;
        } else {
            document.getElementById("vaild-file").innerHTML = "";
        }


    }

    function imgValid() {
        var fileInput = document.getElementById('img');
        var fileError = document.getElementById('vaild-img');

        // Check if a file is selected
        if (fileInput.files.length === 0) {
            fileError.textContent = 'Please select an image file.';
            return false;
        } else {
            fileError.textContent = ''; // Clear previous error message
            return true;
        }
    }

        tinymce.init({
            selector: '#content',
            height: 300,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help'
        });
</script>

<?php include('layouts/footer.php'); ?>

