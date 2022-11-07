<!DOCTYPE html>
<html>

<head>
    <!-- <script src="https://<hostname.tld>/tinymce.min.js" referrerpolicy="origin"></script> -->
    <!-- The script above *must* be listed first because it must be loaded first. -->
    <!-- If it is not listed (and loaded) first, TinyMCE will not work. -->
    <!-- Also: <hostname.tld> above *must* be replaced with the TinyMCE server’s FQDN. -->
    <script src="https://cdn.tiny.cloud/1/zglx6om3ai76c2q72hzp8iiynx82t4sumhx6uxd3hbgeaaz0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- This script provides access to tinyMCE’s premium plugins. -->
</head>

<body>
    <textarea></textarea>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
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
</body>

</html>