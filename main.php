<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>学生信息管理</title>
    <style type="text/css">

        table {
            text-align: center;
        }

    </style>
    <script>
        function doDel(id) {
            if (confirm("确定要删除吗？")) {
                window.location = "action.php?action=del&id=" + id;
            }
        }
    </script>
</head>
<body>
<center>
    <?php include('menu.php'); ?>
    <h3>浏览学生信息</h3>
    <table border="soild" width="800px">
        <tr>
            <td>ID</td>
            <td>姓名</td>
            <td>性别</td>
            <td>年龄</td>
            <td>班别</td>
            <td>操作</td>
        </tr>
        <?php
        //1、连接数据
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=school", "root", "root");
        } catch (PDOException $e) {
            die("" . $e->getMessage());//输出并结束程序，下面的不再执行
        }
        //        print_r($pdo);
        //2.执行sql查询，并解析与遍历
        $sql = "select * from student";
        $result = $pdo->query($sql);
        //        print_r($result);
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['sex']}</td>";
            echo "<td>{$row['age']}</td>";
            echo "<td>{$row['classid']}</td>";
            echo "<td>
                   <a href='javascript:doDel({$row['id']})'>删除</a>
                   <a href='edit.php?id={$row['id']}'>修改</a>
                  </td>";
            echo '</tr>';
        }
        ?>
    </table>
</center>
</body>
</html>