<?php

class AdminController extends ninediyControllers {

    public function __construct() {
        $this->loadModel('admin_model', 'adModel');
    }

    public function index() {
        if (!$this->adModel->checkLogin_byId(1)) {//check login
            header('Refresh:0;url=' . BASEPATH . 'auth/logout');
            die;
        }

        $this->loadview('admin/template/header.php', array('title' => 'administrator cms roampass'));
        $this->loadview('admin/dashboard.php');
        $this->loadview('admin/template/footer.php');
    }

    public function blogcreate() {
        if (!$this->adModel->checkLogin_byId(1)) {//check login
            header('Refresh:0;url=' . BASEPATH . 'auth/logout');
            die;
        }
        $this->loadview('admin/template/header.php', array('title' => 'Create Blog'));
        $this->loadview('admin/createBlog.php');
        $this->loadview('admin/template/footer.php');
    }

    public function doSaveBlog() {
        if (!$this->adModel->checkLogin_byId(1)) {//check login
            header('Refresh:0;url=' . BASEPATH . 'auth/logout');
            die;
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($this->post('title')) {
                $title = $this->post('title');
                $desc = $this->post('desc') ? $this->post('desc') : $this->post('title');
                $keywords = $this->post('keywords');
                $detail = $this->post('detail');
                $status_blog = $this->post('status_blog');

                $blog_id = $this->adModel->saveBlog($title, $desc, $keywords, $detail, $status_blog, $_SESSION['userdata']['member_id']);
                $thumbnail = array('filename' => array(), 'error' => array());
                if ($_FILES['thumbnail']['size'] != 0 && $_FILES['thumbnail']['error'] == 0) {
                    $thumbnail = $this->adModel->uploadImg('thumbnail', 'uploads/blog/');
                }
                $countError = count($thumbnail['error']);
                if ($countError == 0) {
                    if ($this->adModel->saveimgBlog($blog_id, $thumbnail['filename'])) {
                        header('Location:' . BASEPATH . 'admin/blogcreate?status=success');
                        die;
                    } else {
                        header('Location:' . BASEPATH . 'admin/blogcreate?status=error&message=update image not complete!');
                        die;
                    }
                } else {
                    header('Location:' . BASEPATH . 'admin/blogcreate?status=error&message=' . (implode('-', $thumbnail['error'])));
                    die;
                }
            }
        } else {
            header("HTTP/1.0 404 Bad Request");
            die;
        }
    }

    public function bloglist() {
        if (!$this->adModel->checkLogin_byId(1)) {//check login
            header('Refresh:0;url=' . BASEPATH . 'auth/logout');
            die;
        }
        $this->loadview('admin/template/header.php', array('title' => 'Lists Blog'));
        $this->loadview('admin/listBlog.php');
        $this->loadview('admin/template/footer.php');
    }

}
