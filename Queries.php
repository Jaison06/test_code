<?php
include "Database.php";

class Queries
{
    private $handle;

    public function __construct()
    {
        $db = new Database();
        $this->handle = $db->getDb();

    }

    public function Insert($tbl_name, $fields)
    {
        $columns = '';
        $field_values = '';
        foreach ($fields as $key => $value) {
            $field_values .= ':' . $key . ',';
            $columns .= $key . ',';
        }
        $columns = rtrim($columns, ',');
        $field_values = rtrim($field_values, ',');
        $statement = $this->handle->prepare("INSERT INTO " . $tbl_name . " (" . $columns . ") VALUES (" . $field_values . ")");
        $statement->execute($fields);

    }

    public function Update($tbl_name, $fields, $wh_clause)
    {
        $field_values = '';
        foreach ($fields as $key => $value) {
            $field_values .= $key . ' = :' . $key . ',';
        }
        $field_values = rtrim($field_values, ',');
        $cond_field = implode(array_keys($wh_clause));
        $statement = $this->handle->prepare("UPDATE " . $tbl_name . " SET " . $field_values . " WHERE " . $cond_field . " = :" . $cond_field . "");

        foreach ($fields as $key => &$value) {
            $statement->bindParam(':' . $key . '', $value);
        }

        $statement->bindParam(':' . $cond_field . '', $wh_clause[$cond_field]);
        $statement->execute();

    }

    public function Delete($tbl_name, $wh_clause)
    {
        $cond_field = implode(array_keys($wh_clause));
        $statement = $this->handle->prepare("DELETE FROM " . $tbl_name . " WHERE " . $cond_field . " = :" . $cond_field . "");
        $statement->bindParam(':' . $cond_field . '', $wh_clause[$cond_field]);
        $statement->execute();

    }

}
