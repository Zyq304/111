<?php
/*
 * @Description:
 */

include("include/common.php");
$act = isset($_GET['act']) ? $_GET['act'] : null;
@header('Content-Type: application/json; charset=UTF-8');

switch ($act) {

    case 'login':

        $email=$_POST['email'];
        $password=$_POST['password'];

        $user = $DB->get_row("SELECT * FROM `user` WHERE email = '".$email."' and password= '".$password."'");

        if(!$user){
            json(['code' => 500, 'msg' => 'The email or password is incorrect']);

        }

        $_SESSION['email'] =$user['email'];
        $_SESSION['user_id'] =$user['id'];
        $_SESSION['password'] =$user['password'];
        $_SESSION['name'] =$user['name'];
        $_SESSION['photo'] =$user['photo'];

        json(['code' => 200, 'msg' => 'Login successfully']);


        break;
    case 'logout':

        unset($_SESSION['email']);
        unset($_SESSION['name']);
        unset($_SESSION['photo']);
        unset($_SESSION['user_id']);
        unset($_SESSION['password']);
        header("location:index.php");
        exit;

        break;

    case 'register':


        $row = $DB->get_row("SELECT * FROM `user` WHERE email = '".$_POST['email']."'");

        if($row){
            json(['code' => "201", 'msg' => 'The email already exists. Please fill in a new one']);

        }
        $sql = sprintf("INSERT INTO user(create_time,update_time,`name`,`photo`,`password`,`email`) values (%s,%s,%s,%s,%s,%s)",
            GetSQLValueString(time(), "int"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString($_POST['name'], "text"),
            GetSQLValueString($_POST['photo'], "text"),
            GetSQLValueString($_POST['password'], "text"),
            GetSQLValueString($_POST['email'], "text"));

        if ($DB->query($sql) > 0) json(['code' => 200, 'msg' => 'Register successfully']);
        else json(['code' => 201, 'msg' => 'Register failure']);
        break;

    case 'edituser':

        $oldemail=$_POST['oldemail'];
        $name=$_POST['name'];
        $photo=$_POST['photo'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $id=$_POST['id'];
        $user = $DB->get_row("SELECT * FROM `user` WHERE email = '".$email."'");

        if($oldemail != $email && $user ){
            json(['code' => "201", 'msg' => 'The email already exists. Please fill in a new one']);

        }

        $sql = sprintf("UPDATE `user` SET `name` =%s,`photo` =%s,password=%s,email=%s,update_time=%s where id=%s",
            GetSQLValueString($_POST['name'], "text"),
            GetSQLValueString($_POST['photo'], "text"),
            GetSQLValueString($_POST['password'], "text"),
            GetSQLValueString($_POST['email'], "text"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString($_POST['id'], "int"));

        $_SESSION['email'] =$_POST['email'];
        $_SESSION['password'] =$_POST['password'];
        $_SESSION['name'] =$_POST['name'];
        $_SESSION['photo'] =$_POST['photo'];

        if ($DB->query($sql) > 0) json(['code' => 200, 'msg' => 'Edit successfully']);
        else json(['code' => 201, 'msg' => 'Edit failure']);
        break;


    case 'addcomment':
        if(empty($_POST)) json(['code' => "201", 'msg' => 'Please fill in all fields!']);
        if(!$_SESSION['user_id']) json(['code' => "201", 'msg' => 'Please login!']);

        $tm=time();
        $sql = sprintf("INSERT INTO comment(create_time,update_time,parent_id,post_id,user_id,`content`) values (%s,%s,%s,%s,%s,%s)",
            GetSQLValueString($tm, "int"),
            GetSQLValueString($tm, "int"),
            GetSQLValueString($_POST['parent_id'], "text"),
            GetSQLValueString($_POST['post_id'], "text"),
            GetSQLValueString($_SESSION['user_id'], "text"),
            GetSQLValueString($_POST['content'], "text"));

        $id=$DB->insert($sql);

        $data=[];
        $data["id"]=$id;
        $data["head_pic"]=getUserAvatar($_SESSION['user_id']);
        $data["nickname"]=getUserName($_SESSION['user_id']);
        $data["create_time"]=date("Y-m-d H:i:s",$tm);
        $data["content"]=$_POST['content'];
        $data["parent_id"]=$_POST['parent_id'];
        $data["num"]=$DB->count("select count(*) from comment where status=1 and post_id=".$_POST['post_id']);

        if ($id) json(['code' => 200, 'msg' => 'Submit successfully','data'=>$data]);
        else json(['code' => 201, 'msg' => 'Failed to submit, please try to submit again']);

        break;

    case 'addpet':
        # add pet
        if (empty($_POST['category_id'])) json(['code' => "201", 'msg' => 'Please select Category!']);
        if(!$_SESSION['user_id']) json(['code' => "201", 'msg' => 'Please login!']);

        $address=$_POST['address'];
        $jd='';
        $wd='';

        if($address ){
            $jds=getJW($address);
            $jd=$jds[0];
            $wd=$jds[1];
        }

        $sql = sprintf("INSERT INTO pet(jd,wd,user_id,address,age,color,weight,create_time,update_time,category_id,`title`,photo,photo1,photo2,photo3,`content`) values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
            GetSQLValueString($jd, "text"),
            GetSQLValueString($wd, "text"),
            GetSQLValueString($_SESSION['user_id'], "text"),
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
        if (empty($_POST['category_id'])) json(['code' => "201", 'msg' => 'Please select Category!']);
        if(!$_SESSION['user_id']) json(['code' => "201", 'msg' => 'Please login!']);


        $oldaddress=$_POST['address'];
        $address=$_POST['address'];
        $jd=$_POST['jd'];
        $wd=$_POST['wd'];

        if($address && $address!=$oldaddress){
            $jds=getJW($address);
            $jd=$jds[0];
            $wd=$jds[1];
        }

        $sql = sprintf("UPDATE `pet` SET jd=%s,wd=%s,address=%s,age=%s,color=%s,weight=%s,update_time=%s,category_id=%s,`title`=%s,photo=%s,photo1=%s,photo2=%s,photo3=%s,`content`=%s where id=%s",

            GetSQLValueString($jd, "text"),
            GetSQLValueString($wd, "text"),
            GetSQLValueString($_POST['address'], "text"),
            GetSQLValueString($_POST['age'], "text"),
            GetSQLValueString($_POST['color'], "text"),
            GetSQLValueString($_POST['weight'], "text"),
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



    case 'addpost':
# add post
        if (empty($_POST['board_id'])) json(['code' => "201", 'msg' => 'Please select Board!']);
        if(!$_SESSION['user_id']) json(['code' => "201", 'msg' => 'Please login!']);


        $sql = sprintf("INSERT INTO post(create_time,update_time,board_id,`title`,user_id,`content`) values (%s,%s,%s,%s,%s,%s)",

            GetSQLValueString(time(), "int"),
            GetSQLValueString(time(), "int"),
            GetSQLValueString($_POST['board_id'], "text"),
            GetSQLValueString($_POST['title'], "text"),
            GetSQLValueString($_SESSION['user_id'], "text"),
            GetSQLValueString($_POST['content'], "text"));

        if ($DB->query($sql) > 0) json(['code' => 200, 'msg' => 'Add successfully']);
        else json(['code' => 201, 'msg' => 'Add failure']);
        break;
    case 'editpost':
# edit post


        if (empty($_POST['board_id'])) json(['code' => "201", 'msg' => 'Please select Board!']);
        if(!$_SESSION['user_id']) json(['code' => "201", 'msg' => 'Please login!']);



        $sql = sprintf("UPDATE `post` SET update_time=%s,board_id=%s,`title`=%s,`content`=%s where id=%s",

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

    case 'editcomment':

        $sql = sprintf("UPDATE `comment` SET update_time=%s,`content`=%s where id=%s",

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


    default:
        json(['code' => 500, 'msg' => 'The method does not exist!']);
        break;
}
