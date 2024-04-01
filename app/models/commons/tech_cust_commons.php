<?php

namespace app\models\commons;

use system\core\Model;

class tech_cust_commons extends Model
{
    public function __construct()
    {
    }
    public function get(array $columns = null, $request = null)
    {

        $columnssString = '*';
        !is_null($columns) ?
            $columnssString = implode(',', $columns) :
            '';

        // var_dump(self::$db);
        $res = $this->db->select(isset($request["count"]) ? "count(*) as count" : $columnssString)
            ->from($this->allTablesString())
            ->join($this->foreignColumnLiteral(0), $this->foreignColumnLiteral(0, true));
        // conditional

        !$this->isColumnEmpty("STATE") ? $res->and("STATE", $this->getColumnValue("STATE")) : null;
        !$this->isColumnEmpty("MARITAL_STATUS") ? $res->and("MARITAL_STATUS", $this->getColumnValue("MARITAL_STATUS")) : null;
        !$this->isColumnEmpty("ADDRESS") ? $res->and("ADDRESS", $this->getColumnValue("ADDRESS")) : null;
        !$this->isColumnEmpty("GENDER") ? $res->and("GENDER", $this->getColumnValue("GENDER")) : null;
        !$this->isColumnEmpty("EMAIL_VERIFIED") ? $res->and("EMAIL_VERIFIED", $this->getColumnValue("EMAIL_VERIFIED")) : null;
        !$this->isColumnEmpty("NATIONALITY") ? $res->and("NATIONALITY", $this->getColumnValue("NATIONALITY")) : null;
        !$this->isColumnEmpty("BIRTHDATE") ? $res->and("BIRTHDATE", $this->getColumnValue("BIRTHDATE")) : null;
        !$this->isColumnEmpty("USER_ID") ? $res->and($this->getTable("USER_ID"), $this->getColumnValue("USER_ID")) : null;
        // !$this->isColumnEmpty("API_TOKEN") ? $res->and("API_TOKEN", $this->getColumnValue("API_TOKEN")) : null;
        // !$this->isColumnEmpty("USER_ID") ? $res->and("USER_ID", $this->getColumnValue("USER_ID")) : null;

        (!$this->isColumnEmpty($this->getId())) ? $res->and($this->getId(), $this->getIdValue()) : null;
        (isset($request["date"])) ? $res->and("CREATED_AT", "%" . $request["date"] . "%", " like ") : null;
        // end

        $res->order_by("useraccount.USER_ID", 'desc');
        // conditional
        (isset($request["start"]) && isset($request["end"])) ? $res->limit($request["start"], $request["end"]) : null;
        // end
        $res->get();
        return isset($request["count"]) ? $res->single()["count"] : ((!$this->isColumnEmpty($this->getId())) ? $res->single() : $res->result());
    }
    public function delete()
    {
        echo $this->getIdValue();
        return $this->db->delete("useraccount," . $this->getTable())
            ->from($this->allTablesString())
            ->join($this->foreignColumnLiteral(0), $this->foreignColumnLiteral(0, true))
            ->and($this->getId(), $this->getIdValue())
            ->get()
            ->execute();
    }
}
