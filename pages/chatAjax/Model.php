<?php
namespace pages\chatAjax;

class Model extends \core\Model
{
    public function getChatMessages()
    {
        return $this->getAllTableData("SELECT id, user, message, time(timestamp) as zeit FROM chat order by timestamp");
    }

    public function setChatMessage($myMessage, $user)
    {
        $sql = "INSERT INTO chat (user, message) VALUES ('" . $user . "', '" . $myMessage . "');";
        if ( $this->conn->query($sql) === TRUE) {
            return $this->conn->insert_id;
        } else {
            return null;
        }
    }
}