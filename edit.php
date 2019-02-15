<html>
<head>
    <meta charset="UTF-8">
    <title>修改学生信息</title>
</head>
<body>
<center>
    <?php include("menu.php");
    //1、连接数据
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=school", "root", "root");
    } catch (PDOException $e) {
        die("" . $e->getMessage());//输出并结束程序，下面的不再执行
    }
    //2、拼接sql语句，取信息
    $sql = "select * from student where id>=". $_GET["id"];

    $stmt = $pdo->query($sql);
    //print_r($stmt);
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);//解析数据返回相应的数组
        print_r($row);
    } else {
        die(没有要修改的数据);
    }
    ?>
    <h3>修改学生信息</h3>

    <form action="action.php?action=edit" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
        <table>
            <tr>
                <td>姓名</td>
                <td><input type="text" name="name" value="<?php echo $row["name"];?>"></td>
            </tr>
            <tr>
                <td>性别</td>
                <td><input type="radio" name="sex" value="M" <?php echo ($row["sex"]=="M")? "checked":"";?>>男
                    <input type="radio" name="sex" value="N" <?php echo ($row["sex"]=="N")? "checked":"";?>>女</td>
            </tr>
            <tr>
                <td>年龄</td>
                <td><input type="text" name="age" value="<?php echo $row["age"];?>"></td>
            </tr>
            <tr>
                <td>班别</td>
                <td><input type="text" name="classid" value="<?php echo $row["classid"];?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="修改"><input type="reset"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>