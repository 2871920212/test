<meta charset=UTF-8>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/3
 * Time: 10:19
 */
//1.连接数据库
try {
    $pdo = new PDO("mysql:host=localhost;dbname=school", "root", "root");
} catch (PDOException $e) {
    die("数据库连接失败" . $e->getMessage());
}
//2.通过传递过来action的值做相应的操作
switch ($_GET['action']) {
    case 'add':              //增加操作
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $classid = $_POST['classid'];
        //print_r($name.$sex);
        $sql = "insert into student values (null,'{$name}','{$sex}','{$age}','{$classid}')";
        $rw = $pdo->exec($sql);
        //print_r($rw);
        if ($rw > 0) {
            echo "<script>alert('添加成功！');window.location='main.php';</script>";
        } else {
            echo "<script>alert('添加失败！');window.history.back();</script>";
        }
        break;

    case 'del':         //删除操作
        $id = $_GET['id'];
        $sql = "delete from student where id={$id}";
        $pdo->exec($sql);
        header("location:main.php");
        break;

    case 'edit':       //修改操作
        //获取表单信息
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $classid = $_POST['classid'];

        $sql = "update student set name='{$name}',sex='{$sex}',age={$age},classid={$classid} where id={$id}";
        //print_r($sql);
        $stmt = $pdo->exec($sql);
        if ($stmt > 0) {
            echo "<script>alert('修改成功！');window.location='main.php';</script>";
        } else {
            echo "<script>alert('修改失败！');window.history.back();</script>";
        }
        break;
}
