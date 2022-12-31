<?php
namespace pages\blog\repository;

class SQLBlogRepository extends \core\Model implements BlogRepositoryInterface
{
    private $infoDetails = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData()
    {
        $returnValue = false;
        $sqlQuery = "SELECT id, DATE_FORMAT(datum, '%d. %M %Y um %H:%i') as datum, titel, text, user FROM blog order by datum";
        if ($result = $this->getAllTableData($sqlQuery)) {
            $returnValue = $result;
        }
        return $returnValue;
    }

    public function find($id)
    {
        $returnValue = false;
        $sqlQuery = "SELECT id, datum, titel, text, user FROM blog where id=" . $id;
        if ($result = $this->getTableData($sqlQuery)) {
            $returnValue = $result;

            if (isset($returnValue['datum'])) {
                $date = new \DateTimeImmutable($returnValue['datum']);
                $returnValue['datum'] = $date->format('d.m.Y H:i:s');
            }
        }

        return $returnValue;
    }

    public function save(Blogdata $blogdata)
    {
        $returnValue = false;

        if(isset($blogdata->datum)) {
            $date = new \DateTimeImmutable($blogdata->datum);
            $blogdata->datum = $date->format('Y-m-d H:i:s');
        }

        $sql = "INSERT INTO blog (id, datum, titel, text, user) ".
            "VALUES('" . $blogdata->id . "', '" . $blogdata->datum . "', '" . $blogdata->titel . "', '" . $blogdata->text . "', '" . $blogdata->user . "') ".
            "ON DUPLICATE KEY UPDATE datum='" . $blogdata->datum . "', titel='" . $blogdata->titel . "', text='" . $blogdata->text . "', USER='" . $blogdata->user . "';";

        if ( $this->conn->query($sql) === TRUE) {
            $returnValue = $this->conn->insert_id;
        }

        return $returnValue;
    }

    public function remove($id)
    {
        $this->removeTableData("DELETE FROM blog where id=" . $id);
    }

    public function getInfoDetails(){
        return $this->infoDetails;
    }
}