<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajax上传文件</title>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
</head>
<body>
用户名：<input id="username" type="text"><br>
用户图像：<input id="userface" type="file" onchange="preview(this)"><br>
<div id="preview"></div>
<input type="button" id="btnClick" value="上传">
<script>
    $("#btnClick").click(function () {
        var formData = new FormData();
        formData.append("username", $("#username").val());
        formData.append("file", $("#userface")[0].files[0]);
        $.ajax({
            url: './uploaddatabase.php',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (msg) {
                alert(msg);
            }
        });
    });
    function preview(file) {
        var prevDiv = document.getElementById('preview');
        if (file.files && file.files[0]) {
            var reader = new FileReader();
            reader.onload = function (evt) {
                prevDiv.innerHTML = '<img src="' + evt.target.result + '" />';
            }
            reader.readAsDataURL(file.files[0]);
        } else {
            prevDiv.innerHTML = '<div class="img" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>';
        }
    }
</script>
</body>
</html>