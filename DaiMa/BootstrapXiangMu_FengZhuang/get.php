<?php
error_reporting(E_ALL ^ E_NOTICE);
header("Access-Control-Allow-Orgin:*");
include 'db.class.php';
$db = new db();
/*数据库连接语句*/
$db->mysql('localhost', 'root', 'root', 'angular', 'leo_', 'utf8');
//print_r($_GET);exit;
extract($_GET, EXTR_SKIP);   
extract($_POST, EXTR_SKIP);

/**
 * 列表
 */
if ($action == 'get_list') {
    $limit = $order = '';
    if (is_numeric($offset) && is_numeric($rows)) {
        $limit = " LIMIT $offset,$rows";
    }
    $orderBy = empty($orderBy) ? 'DESC' : $orderBy;
    if (is_string($orderField)) {
        $order = " ORDER BY $orderField $orderBy";
    }
    $where = empty($where) ? '' : $db->format_condition($where);
  
    $sql = "SELECT a.*,b.typename,b.reid FROM `leo_article` AS a INNER JOIN `leo_arctype` AS b ON a.typeid = b.id $where $order $limit";
  
    $list = $db->query($sql)->fetchall();
    // $list = $db->fetchall('article', '*', "$where", "$order", "$limit");
    echo json_encode($list);
    return;
}

/**
 * 根据条件返回总页数$sum
 */
if ($action == 'get_total') {
    // $num = empty($num) || $num == 0 ? 10 : $num;
    $where = empty($where) ? '' : $where;
    $sum = $db->rowcount('article', $where);
    // $total = ceil($sum/$num);
    echo json_encode(array('total' => $sum));
    return;
}
/**
 * 添加文章
 * @param string $title 文章标题
 * @param string $content 文章内容
 * @param string $typename 所属分类
 * @return 
 */
if ($action == 'add_article') {
    if (empty($title)) {
        $reArr['errors']['title'] = '标题必须';
    }
    if (empty($content)) {
        $reArr['errors']['content'] = '内容必须';
    }
    if (empty($typeid['id'])) {
        $reArr['errors']['typeid'] = '分类必须';
    }
    if (empty($title) || empty($content) || empty($typeid['id'])) {
        echo json_encode($reArr);
        return;
    }
    //判断分类是否存在
    $id = $db->rowcount('arctype', array('id' => "$typeid[id]"));//官
    if (!$id) {
        echo json_encode(array('code' => 103));
        return;
    }
    $result = $db->insert('article', array('title' => "$title", 'content' => "$content", 'typeid' =>"$typeid[id]", 'addtime' => time()));
    if ($result) {
        //返回添加的数据的ID
        echo json_encode(array('article_id' => $db->lastinsertid()));
        return;
    }
    echo json_encode(array('code' => 102));
    return;
}
/**
 * 获得一篇文章
 */
if ($action == 'get_article') {
    $sql = "SELECT a.*,b.typename,b.reid FROM `leo_article` AS a INNER JOIN `leo_arctype` AS b ON a.typeid = b.id WHERE a.id = $id";
    $data = $db->query($sql)->fetch();
    // $data = $db->fetch('article', '*', array('id' => $id));
    if ($data) {
        echo json_encode($data);
        return;
    }
    echo json_encode(array('code' => 102));
    return;
}
/**
 * 更新
 */
if ($action == 'update_article') {
    if (empty($title)) {
        $reArr['errors']['title'] = '标题必须';
    }
    if (empty($content)) {
        $reArr['errors']['content'] = '内容必须';
    }
    if (empty($typeid)) {
        $reArr['errors']['typeid'] = '分类必须';
    }
    if (empty($title) || empty($content) || empty($typeid)) {
        echo json_encode($reArr);
        return;
    }
    $result = $db->update('article', array('title' => "$title", 'content' => "$content", 'typeid' => "$typeid"), array('id' => $id));
    $code = $result ? 101 : 102;
    echo json_encode(array('code' => $code));
    return;
}
/**
 * 删除
 * @param string $id
 * @return void
 */
if ($action == 'delete_article') {
    $result = $db->delete('article', array('id' => "$id"));
    $code = $result ? 101 : 102;
    echo json_encode(array('code' => $code));
    return;
}
/**
 * 获取所有分类
 * 左侧
 */
if ($action == 'get_arctype') {
    $where = empty($where) ? '' : $where;
    $arctype = $db->fetchall('arctype', '*',"$where");
    if ($arctype) {
        echo json_encode($arctype);
        return;
    }
    echo json_encode(array('code' => 102));
    return;
}
/**
 * 用户登录
 */

//aciton=login&username=lzy&password=admin参数
if ($action == 'login') {
    $reArr = array('success' => false);
    //用户名为空的情况下
    if (empty($username)) {
        $reArr['errors']['username'] = '用户名必须';
    }
    //密码为空的情况下
    if (empty($password)) {
        $reArr['errors']['password'] = '密码必须';
    }
    if (empty($username) || empty($password)) {
        //数组转化为JSON格式
        echo json_encode($reArr);
        return;
    }
    $result = $db->fetch('user', 'id', array('username' => $username, 'password' => $password));
    if ($result) {
        echo json_encode(array('success' => true, 'message' => '操作成功'));
        return;
    }
    echo json_encode(array('success' => false , 'message' => '用户名密码错误'));
    return;
}
echo json_encode(array('status' => 'error'));
return;