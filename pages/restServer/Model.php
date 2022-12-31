<?php
namespace pages\restServer;

class Model extends \core\Model
{
    public function getAllBlogdata()
    {
        return $this->getAllTableData("SELECT id, DATE_FORMAT(datum, '%d. %M %Y um %H:%i') as datum, titel, text, user FROM blog order by datum");
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

    public function setBlogdata($data)
    {
        if(isset($data['datum'])) {
            $date = new \DateTimeImmutable($data['datum']);
            $data['datum'] = $date->format('Y-m-d H:i:s');
        }

        $sql = "INSERT INTO blog (id, datum, titel, text, user) ".
            "VALUES('" . $data['id'] . "', '" . $data['datum'] . "', '" . $data['titel'] . "', '" . $data['text'] . "', '" . $data['user'] . "') ".
            "ON DUPLICATE KEY UPDATE datum='" . $data['datum'] . "', titel='" . $data['titel'] . "', text='" . $data['text'] . "', USER='" . $data['user'] . "';";

        if ( $this->conn->query($sql) === TRUE) {
            return $this->conn->insert_id;
        } else {
            return null;
        }
    }
}