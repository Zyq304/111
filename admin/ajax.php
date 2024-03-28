<?php
/*

 * @Description: 管理员AJAX接口
 
 
 */

include("../include/common.php");
$act = isset($_GET['act']) ? $_GET['act'] : null;
@header('Content-Type: application/json; charset=UTF-8');

switch ($act) {
    case 'login':

        if (empty($_POST['username']) || empty($_POST['password'])) json(['code' => "201", 'msg' => 'Please fill in all fields!']);

        $user = $_POST['username'];
        $pwd = $_POST['password'];



        $row = $DB->get_row("SELECT * FROM `admin` WHERE username = '".$user."' and  password = '".$pwd."' ");


        if ($row) {

            $_SESSION['admin'] = true;
            $_SESSION['user_id'] = $row['id'];

            json(['code' => 200, 'msg' => 'Login successfully']);
        } else {
            json(['code' => 201, 'msg' => 'The username or password is incorrect']);
        }
        break;



    case 'addpet':
# add pet
        if (empty($_POST['title'])) json(['code' => "201", 'msg' => 'Please fill in all fields!']);


        $address=$_POST['address'];
        $jd='';
        $wd='';

        if($address ){
            $jds=getJW($address);
            $jd=$jds[0];
            $wd=$jds[1];
        }

        $sql = sprintf("INSERT INTO pet(jd,wd,address,age,color,weight,create_time,update_time,category_id,`title`,photo,photo1,photo2,photo3,`content`) values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
            GetSQLValueString($jd, "text"),
            GetSQLValueString($wd, "text"),
            GetSQLValueString($_POST['address'], "text"),
            GetSQLValueString($_POST['age'], "text"),
            GetSQLValueString($_POST['color'], "text"),
            GetSQLValueString($_POST['weight'], "text"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString($_POST['category_id'], "text"),
            GetSQLValueString($_POST['title'], "text"),
            GetSQLValueString($_POST['photo'], "text"),
            GetSQLValueString($_POST['photo1'], "text"),
            GetSQLValueString($_POST['photo2'], "text"),
            GetSQLValueString($_POST['photo3'], "text"),
            GetSQLValueString($_POST['content'], "text"));

        if ($DB->query($sql) > 0) json(['code' => 200, 'msg' => 'Add successfully']);
        else json(['code' => 201, 'msg' => 'Add failure']);
        break;
    case 'editpet':
# edit pet



        $oldaddress=$_POST['address'];
        $address=$_POST['address'];
        $jd=$_POST['jd'];
        $wd=$_POST['wd'];

        if($address && $address!=$oldaddress){
            $jds=getJW($address);
            $jd=$jds[0];
            $wd=$jds[1];
        }

        $sql = sprintf("UPDATE `pet` SET jd=%s,wd=%s, address=%s,age=%s,color=%s,weight=%s,user_id=%s,update_time=%s,category_id=%s,`title`=%s,photo=%s,photo1=%s,photo2=%s,photo3=%s,`content`=%s where id=%s",

            GetSQLValueString($jd, "text"),
            GetSQLValueString($wd, "text"),
            GetSQLValueString($_POST['address'], "text"),
            GetSQLValueString($_POST['age'], "text"),
            GetSQLValueString($_POST['color'], "text"),
            GetSQLValueString($_POST['weight'], "text"),
            GetSQLValueString($_POST['user_id'], "text"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString($_POST['category_id'], "text"),
            GetSQLValueString($_POST['title'], "text"),
            GetSQLValueString($_POST['photo'], "text"),
            GetSQLValueString($_POST['photo1'], "text"),
            GetSQLValueString($_POST['photo2'], "text"),
            GetSQLValueString($_POST['photo3'], "text"),
            GetSQLValueString($_POST['content'], "text"),
            GetSQLValueString($_POST['id'], "int"));


        if ($DB->query($sql) > 0) json(['code' => 200, 'msg' => 'Edit successfully']);
        else json(['code' => 201, 'msg' => 'Edit failure']);
        break;
    case 'delpet':
        # Delete pet
        if (empty($_POST['id'])) json(['code' => "201", 'msg' => 'No ID submitted!']);

        if ($DB->query("DELETE FROM `pet` WHERE `id` = " . intval($_POST['id'])) > 0) json(['code' => 200, 'msg' => 'Delete successfully ']);
        else json(['code' => 201, 'msg' => 'Delete failure']);
        break;





    case 'editpost':
# edit post


        $sql = sprintf("UPDATE `post` SET user_id=%s,update_time=%s,board_id=%s,`title`=%s,`content`=%s where id=%s",

            GetSQLValueString($_POST['user_id'], "text"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString($_POST['board_id'], "text"),
            GetSQLValueString($_POST['title'], "text"),
            GetSQLValueString($_POST['content'], "text"),
            GetSQLValueString($_POST['id'], "int"));


        if ($DB->query($sql) > 0) json(['code' => 200, 'msg' => 'Edit successfully']);
        else json(['code' => 201, 'msg' => 'Edit failure']);
        break;
    case 'delpost':
        # Delete post
        if (empty($_POST['id'])) json(['code' => "201", 'msg' => 'No ID submitted!']);

        if ($DB->query("DELETE FROM `post` WHERE `id` = " . intval($_POST['id'])) > 0){
            $DB->query("DELETE FROM `comment` WHERE `post_id` = " . intval($_POST['id']));
            json(['code' => 200, 'msg' => 'Delete successfully ']);
        }else{
            json(['code' => 201, 'msg' => 'Delete failure']);
        }
        break;


    case 'editblock':
    # edit Block Management
        $sql = sprintf("UPDATE `block` SET `title` =%s,content=%s,update_time=%s where id=%s",
            GetSQLValueString($_POST['title'], "text"),
            GetSQLValueString($_POST['content'], "text"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString($_POST['id'], "int"));

        if ($DB->query($sql) > 0) json(['code' => 200, 'msg' => 'Edit successfully']);
        else json(['code' => 201, 'msg' => 'Edit failure']);
        break;


    case 'adduser':
    #  User Management
        if (empty($_POST['name'])) json(['code' => "201", 'msg' => 'Please fill in all fields!']);



        $row = $DB->get_row("SELECT * FROM `user` WHERE email = '".$_POST['email']."'");

        if($row){
            json(['code' => "201", 'msg' => 'The email already exists. Please fill in a new one']);

        }
        $sql = sprintf("INSERT INTO user(photo,create_time,update_time,`name`,`password`,`email`) values (%s,%s,%s,%s,%s,%s)",

            GetSQLValueString($_POST['photo'], "text"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString($_POST['name'], "text"),
            GetSQLValueString($_POST['password'], "text"),
            GetSQLValueString($_POST['email'], "text"));

        if ($DB->query($sql) > 0) json(['code' => 200, 'msg' => 'Add successfully']);
        else json(['code' => 201, 'msg' => 'Add failure']);
        break;
    case 'edituser':
    #  User Management



        $row = $DB->get_row("SELECT * FROM `user` WHERE email = '".$_POST['email']."'");

        if($_POST['oldemail']!=$_POST['email'] && $row){
            json(['code' => "201", 'msg' => 'The email already exists. Please fill in a new one']);

        }

        $sql = sprintf("UPDATE `user` SET `photo` =%s,`name` =%s,password=%s,email=%s,update_time=%s where id=%s",
            GetSQLValueString($_POST['photo'], "text"),
            GetSQLValueString($_POST['name'], "text"),
            GetSQLValueString($_POST['password'], "text"),
            GetSQLValueString($_POST['email'], "text"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString($_POST['id'], "int"));

        if ($DB->query($sql) > 0) json(['code' => 200, 'msg' => 'Edit successfully']);
        else json(['code' => 201, 'msg' => 'Edit failure']);
        break;
    case 'deluser':
     # Delete User Management
        if (empty($_POST['id'])) json(['code' => "201", 'msg' => 'No ID submitted!']);

        if ($DB->query("DELETE FROM `user` WHERE `id` = " . intval($_POST['id'])) > 0) json(['code' => 200, 'msg' => 'Delete successfully ']);
        else json(['code' => 201, 'msg' => 'Delete failure']);
        break;




    case 'editcomment':

        $sql = sprintf("UPDATE `comment` SET user_id=%s,update_time=%s,`content`=%s where id=%s",

            GetSQLValueString($_POST['user_id'], "text"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString($_POST['content'], "text"),
            GetSQLValueString($_POST['id'], "int"));


        if ($DB->query($sql) > 0) json(['code' => 200, 'msg' => 'Edit successfully']);
        else json(['code' => 201, 'msg' => 'Edit failure']);
        break;
    case 'delcomment':
# Delete comment
        if (empty($_POST['id'])) json(['code' => "201", 'msg' => 'No ID submitted!']);

        if ($DB->query("DELETE FROM `comment` WHERE `id` = " . intval($_POST['id'])) > 0) json(['code' => 200, 'msg' => 'Delete successfully ']);
        else json(['code' => 201, 'msg' => 'Delete failure']);
        break;

    case 'addcategory':
        #  Category Management
        if (empty($_POST['title'])) json(['code' => "201", 'msg' => 'Please fill in all fields!']);


        $sql = sprintf("INSERT INTO category(create_time,update_time,`title`) values (%s,%s,%s)",
            GetSQLValueString(time(), "int"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString($_POST['title'], "text"));

        if ($DB->query($sql) > 0) json(['code' => 200, 'msg' => 'Add successfully']);
        else json(['code' => 201, 'msg' => 'Add failure']);
        break;
    case 'editcategory':
        #  Category Management
        $sql = sprintf("UPDATE `category` SET `title` =%s,update_time=%s where id=%s",
            GetSQLValueString($_POST['title'], "text"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString($_POST['id'], "int"));

        if ($DB->query($sql) > 0) json(['code' => 200, 'msg' => 'Edit successfully']);
        else json(['code' => 201, 'msg' => 'Edit failure']);
        break;
    case 'delcategory':
        # Delete Category Management
        if (empty($_POST['id'])) json(['code' => "201", 'msg' => 'No ID submitted!']);

        if ($DB->query("DELETE FROM `category` WHERE `id` = " . intval($_POST['id'])) > 0) json(['code' => 200, 'msg' => 'Delete successfully ']);
        else json(['code' => 201, 'msg' => 'Delete failure']);
        break;


    case 'addboard':
        #  Board Management
        if (empty($_POST['title'])) json(['code' => "201", 'msg' => 'Please fill in all fields!']);


        $sql = sprintf("INSERT INTO board(create_time,update_time,`title`) values (%s,%s,%s)",
            GetSQLValueString(time(), "int"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString($_POST['title'], "text"));

        if ($DB->query($sql) > 0) json(['code' => 200, 'msg' => 'Add successfully']);
        else json(['code' => 201, 'msg' => 'Add failure']);
        break;
    case 'editboard':
        #  Board Management
        $sql = sprintf("UPDATE `board` SET `title` =%s,update_time=%s where id=%s",
            GetSQLValueString($_POST['title'], "text"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString($_POST['id'], "int"));

        if ($DB->query($sql) > 0) json(['code' => 200, 'msg' => 'Edit successfully']);
        else json(['code' => 201, 'msg' => 'Edit failure']);
        break;
    case 'delboard':
        # Delete Board Management
        if (empty($_POST['id'])) json(['code' => "201", 'msg' => 'No ID submitted!']);

        if ($DB->query("DELETE FROM `board` WHERE `id` = " . intval($_POST['id'])) > 0) json(['code' => 200, 'msg' => 'Delete successfully ']);
        else json(['code' => 201, 'msg' => 'Delete failure']);
        break;

    default:
        json(['code' => 500, 'msg' => 'The method does not exist!']);
        break;
}
