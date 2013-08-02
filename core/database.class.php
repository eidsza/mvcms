<?php

class Database extends PDO {

    public function __construct($dbvars) {

        parent::__construct("mysql:host=" . $dbvars["DB_SERVER"] . ";dbname=" . $dbvars["DB_NAME"], $dbvars["DB_USER"], $dbvars["DB_PASS"]);

        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        parent::query('SET NAMES ' . $dbvars['DB_CHAR_SET']);
        parent::query('SET CHARACTER SET ' . $dbvars['DB_CHAR_SET']);


        //parent::setAttribute(PDO::ATTR_EMULATE_PREPARES, true);//
        //parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIONS);
    }

    /**
     * select
     * @param string $sql An SQL string
     * @param array $array Paramters to bind
     * @param constant $fetchMode A PDO Fetch mode
     * @return mixed
     */
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC) {

        //$sql = 'SELECT PT.* FROM ecms3_page_translations PT WHERE PT.page_ln =:ln AND PT.is_visible=1  AND PT.is_main=1';
        $sth = $this->prepare($sql);

        foreach ($array as $key => $value) {

            $sth->bindValue(":$key", $value);
        }

       // print_r($sth);
       // print_r($sth->debugDumpParams());
        $sth->execute();

        return $sth->fetchAll($fetchMode);
    }

    /**
     * insert
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     */
    public function insert($table, $data) {
        ksort($data);

        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));



        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        //print_r($sth);
        return $sth->execute();
    }

    public function replace($table, $data) {
        ksort($data);

        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $sth = $this->prepare("REPLACE INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach ($data as $key => $value) {

            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
    }

    /**
     * update
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     * @param string $where the WHERE query part
     */
    public function update($table, $data, $where) {
        ksort($data);



        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');

        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        print_r($sth);
        return $sth->execute();
    }

    /**
     * delete
     * 
     * @param string $table
     * @param string $where
     * @param integer $limit
     * @return integer Affected Rows
     */
    public function delete($table, $where, $limit = 1) {
        /*
          $sth = $this->prepare("DELETE FROM :table WHERE :where LIMIT :limit");
          $sth->bindValue(":table", $table);
          $sth->bindValue(":where", $where);
          $sth->bindValue(":limit", $limit);

          echo $sth->debugDumpParams();
          $sth->execute();
          return $sth->rowCount();
         * 
         */
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }

    public function query($sql, $data) {
        //$fetchMode = PDO::FETCH_ASSOC;

        $stx = $this->prepare($sql);
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $stx->bindValue(":$key", $value);
            }
        }

        //print_r($stx->debugDumpParams());
        $stx->execute();
        return $stx->rowCount();
        //print_r($stx->fetchAll());
    }

}