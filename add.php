<html>
<head>
    <meta charset="UTF-8">
    <title>添加学生</title>
</head>
<body>
<center>
    <?php include("menu.php");?>
    <h3>增加学生信息</h3>
    <form action="action.php?action=add" method="post">
        <table>
            <tr>
                <td>姓名</td><td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>性别</td><td><input type="radio" name="sex" value="M">男<input type="radio" name="sex" value="N">女</td>
            </tr>
            <tr>
                <td>年龄</td><td><input type="text" name="age"></td>
            </tr>
            <tr>
                <td>班别</td><td><input type="text" name="classid"></td>
            </tr>
            <tr>
                <td></td><td><input type="submit"><input type="reset"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>