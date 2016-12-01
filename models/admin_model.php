<?php

class admin_model {

    public function __construct() {
        $this->db = new DatabaseHelper();
        $this->db->connect();
    }

    public function checkLogin_byId($permission = 0) {
        if (isset($_SESSION['userdata'])) {
            $sqlcmd = "SELECT `member_id` FROM `member` WHERE `member_id`=%n AND `permission`=%n";
            return $this->db->query($sqlcmd, array($_SESSION['userdata']['member_id'], $permission));
        } else {
            return false;
        }
    }

    public function saveBlog($title, $desc, $keywords, $detail, $status_blog, $member_id) {
        $sqlcmd = 'INSERT INTO `blog` SET `title`=%s,`short_title`=%s,`full_detail`=%s,`keyword`=%s,`blog_status`=%n,`member_id`=%n';
        if ($this->db->query($sqlcmd, array($title, $desc, $detail, $keywords, $status_blog, $member_id))) {
            return $this->db->queryValue("SELECT LAST_INSERT_ID()");
        } else {
            return 0;
        }
    }

    public function uploadImg($filename = '', $path = 'uploads/') {
        $error = array();
        $message = array();
        $target_dir = $path;

        $target_file = $target_dir . basename($_FILES[$filename]["name"]); //file for target check

        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES[$filename]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $error[] = "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $error[] = "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES[$filename]["size"] > 500000) {
            $error[] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $error[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $error[] = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            $new_name_file = $target_dir . md5(time() . 'roampass') . '.' . $imageFileType; //create new filename
            if (move_uploaded_file($_FILES[$filename]["tmp_name"], $new_name_file)) {
                $message[] = $new_name_file;
            } else {
                $error[] = "Sorry, there was an error uploading your file.";
            }
        }
        return array('filename' => $message, 'error' => $error);
    }

    public function saveimgBlog($blog_id, $thumbnail) {
        $sqlcmd = "UPDATE `blog` SET `thumbnail`=%s WHERE `blog_id`=%n";
        return $this->db->query($sqlcmd, array($thumbnail, $blog_id));
    }

    public function updateBlog($title, $desc, $keywords, $detail, $status_blog, $blog_id) {
        
    }

}
