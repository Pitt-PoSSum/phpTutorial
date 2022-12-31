<?php

class SoapServer_model extends \core\Model
{
    public function getAllBlogdata()
    {
        return $this->getAllTableData("SELECT id, DATE_FORMAT(datum, '%d. %M %Y um %H:%i') as datum, titel, text, user FROM blog order by datum");
    }

    public function getMaxBlogId()
    {
        return $this->getMaxId('blog');
    }

    public function getSingleBlogdata($id)
    {
        if (is_numeric($id)) {
            return $this->getTableData("SELECT id, datum, titel, text, user FROM blog where id=" . $id);
        }
    }

    public function removeBlogdata($id){
        if (is_numeric($id)) {
            return $this->removeTableData("DELETE FROM blog where id=" . $id);
        }
    }

    public function setBlogdata($blogdata)
    {
        if(isset($blogdata->datum)) {
            $date = new \DateTimeImmutable($blogdata->datum);
            $blogdata->datum = $date->format('Y-m-d H:i:s');
        }

        $sql = "INSERT INTO blog (id, datum, titel, text, user) ".
            "VALUES('" . $blogdata->id . "', '" . $blogdata->datum . "', '" . $blogdata->titel . "', '" . $blogdata->text . "', '" . $blogdata->user . "') ".
            "ON DUPLICATE KEY UPDATE datum='" . $blogdata->datum . "', titel='" . $blogdata->titel . "', text='" . $blogdata->text . "', USER='" . $blogdata->user . "';";

        if ( $this->conn->query($sql) === TRUE) {
            return $this->conn->insert_id;
        } else {
            return null;
        }
    }
}