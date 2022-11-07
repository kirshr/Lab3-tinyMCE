<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./sass/styles.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a class="not-links" x="date" y="today" href="">Today</a>
        <a class="not-links" x="date" y="yesterday" href="">Yesterday</a>
        <a class="not-links" x="date" y="last_week" href="">Last Week</a>
    </nav>
    <main>
        <div id="comment_form">
                
        </div>
        <form action="">
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment"></textarea>
            <input type="submit" name="Submit">
            <script src="https://cdn.tiny.cloud/1/sbd701tluh9h03fdj33n797wkj9x0ryesmzyrwkbj7ze51mr/tinymce/6/tinymce.min.js"        referrerpolicy="origin"></script>
             <script>
                tinymce.init({
                    selector: 'textarea',
                    skin: "oxide-dark",
                    content_css: "dark",
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount insertdatetime',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [{
                            value: 'First.Name',
                            title: 'First Name'
                        },
                        {
                            value: 'Email',
                            title: 'Email'
                        },
                    ],
                });
            </script>
        </form>
        <aside>
            <h2>User Comments</h2>
            <!-- comments will appear here -->
            <div class="sidebar">
                <?php include 'sidebar.php'; ?>
            </div>
        </aside>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $().ready(function() {
            $('.not-links').click(function(e) {
                $.ajax({
                        type: "GET",
                        url: "display.php",
                        data: "displayby="+ $(this).attr("x") + "&displayvalue=" + $(this).attr("y"),
                        success: function(response2) {
                        $('.sidebar').html(response2);
                        }
                    });
                e.preventDefault();
            });
            $('form').on('submit', function(e) {
                let datastring = $(this).serialize(); //Encode a set of form elements as a string for submission.
                console.log(datastring);
                $.ajax({
                    type: "POST",
                    url: "process.php",
                    data: datastring,
                    success: function(data) {
                        $('#comment_form').html(data);
                        $.ajax({
                            type: "GET",
                            url: "sidebar.php",
                            success: function(response2) {
                            $('.sidebar').html(response2);
                            }
                        });
                    }
                })
            e.preventDefault();
            })
        })
    </script>

</body>
</html>
