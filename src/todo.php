<?php
session_start();

function displayToDo() {
    if (isset($_SESSION['incomplete'])) {
        foreach ($_SESSION['incomplete'] as $key => $value) {
            echo '<li><input type="checkbox" name="check">
            <label>' . $value . '</label><input type="text"><button class="edit" name="editBtn">Edit</button>
            <button class="delete" name="deleteBtn">Delete</button>
            <input type="text" hidden name="myVal" value="' . $key . '"></li>';
        }
    }
else echo "";
}
function displayComplete() {
    if (isset($_SESSION['complete'])) {
        foreach ($_SESSION['complete'] as $keys => $values) {
            echo '<li><input type="checkbox" checked>
            <label>' . $values . '</label><input type="text"><button class="edit" name="editBtn2">Edit</button>
            <button class="delete" name="deleteBtn2">Delete</button>
            <input type="text" hidden name="myVal" value="' . $keys . '"></li>';
        }
    }
else echo "";
}
if(isset($_POST['input'])){
    if(isset($_SESSION['incomplete'])){
        array_push($_SESSION['incomplete'],$_POST['input']);
    }else{
        $_SESSION['incomplete'] = array($_POST['input']);
    }
}

if(isset($_POST['index-pos'])) {
array_splice($_SESSION['incomplete'],$_POST['index-pos'],1);
}
if(isset($_POST['inputUpdt'])){
    if(isset($_SESSION['incomplete'])) {
        foreach($_SESSION['incomplete'] as $key => $value){
            if($key==$_POST['myIndex']){
            $_SESSION['incomplete'][$key]=$_POST['inputUpdt'];

            }
        }
    }
}
if(isset($_POST['pos'])){
    $_SESSION['temp']=$_SESSION['incomplete'][$_POST['pos']];
    array_splice($_SESSION['incomplete'],$_POST['pos'],1);


    if(isset($_SESSION['complete'])){
        array_push($_SESSION['complete'],$_SESSION['temp']);
    }
    else {
        $_SESSION['complete']=array($_SESSION['temp']);
    }
    $myArr=array();
    $myArr['incomplete'] = $_SESSION['incomplete'];
    $myArr['complete'] = $_SESSION['complete'];
    echo json_encode($myArr);
}
elseif(isset($_POST['index-posit'])) {
    array_splice($_SESSION['complete'],$_POST['index-posit'],1);
    echo json_encode($_SESSION['complete']);
}
elseif(isset($_POST['index-position'])) {
    echo json_encode($_SESSION['complete']);
}
elseif(isset($_POST['inputUpdt1'])) {
    if(isset($_SESSION['complete'])){
        foreach($_SESSION['complete'] as $key=>$value){
            if($key == $_POST['myIndex']){
                $_SESSION['complete'][$key]=$_POST['inputUpdt1'];
            }
        }
    }
    echo json_encode($_SESSION['complete']);
}
else{
    if(isset($_SESSION['incomplete'])) {
        echo json_encode($_SESSION['incomplete']);
    }
}

?>