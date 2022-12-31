<?php
namespace pages\wordle;

class Model extends \core\Model
{
    public function getWordle()
    {
        return $this->getTableData("SELECT UPPER(wort) as wort FROM wordle AS primWordle JOIN (SELECT CEIL(RAND() * (SELECT MAX(id) FROM wordle)) AS id) AS subWordle WHERE primWordle.id >= subWordle.id ORDER BY primWordle.id ASC LIMIT 1;");
    }
}