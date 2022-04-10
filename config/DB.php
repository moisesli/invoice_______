<?php

namespace Config;
use PDO;
use PDOStatement;

class DB
{
  /**
   * PDO instance.
   *
   * @var \PDO
   */
  private $_pdo;

  /**
   * Prepared query object.
   *
   * @var \PDOStatement
   */
  private $_query;

  /**
   * Last error.
   *
   * @var boolean
   */
  private $_error = false;

  /**
   * Query results.
   *
   * @var array
   */
  private $_results;

  /**
   * Row count.
   *
   * @var int
   */
  private $_count = 0;

  /**
   * ctor.
   *
   * @param string $host - The connection hostname
   * @param string $user - The connection's username
   * @param string $pass - The user's password
   * @param string $db   - The database to connecto to
   *
   * @return void
   */
  public function __construct($host, $user, $pass, $db)
  {
    $this->_pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
  }

  /**
   * Created the prepared statement and executes the SQL query.
   *
   * @param string $sql    - The statement to prepare
   * @param array  $values - The values to bind to the statement
   *
   * @return mixed
   */
  public function query($sql, array $values = [])
  {
    $this->_error = false; // reset to false
    $this->_query = $this->_pdo->prepare($sql);

    $x = 1;
    if (count($values)) {
      foreach ($values as $value) {
        $this->_query->bindValue($x, $value);
        $x++;
      }
    }

    if ($this->_query->execute()) {
      $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
      $this->_count = $this->_query->rowCount();
    } else {
      $this->_error = true;
    }

    return $this;
  }

  /**
   * Inserts a row into the database.
   *
   * @param string $table  - The table to insert the row into
   * @param array  $fields - The fields to insert into the row
   *
   * @return boolean
   */
  public function insert($table, array $fields = [])
  {
    $keys = array_keys($fields);
    $values = '';
    foreach ($fields as $field) {
      $values .= '?, ';
    }
    $values = rtrim($values, ', ');

    $sql = "INSERT INTO `$table` (`".implode('`, `', $keys)."`) VALUES ($values)";

    if (!$this->query($sql, $fields)->error()) {
      return true;
    }

    return false;
  }

  /**
   * Runs a select query.
   *
   * @param string $table - The table to select the row from
   * @param array  $params - The select query's parameters
   *
   * @return mixed
   */
  public function select($table, array $params = [])
  {
    return $this->action('SELECT *', $table, $params);
  }

  /**
   * Runs an update query.
   *
   * @param string $table  - The table to run the query on
   * @param string $id     - The row's ID
   * @param array  $fields - The fields to use in the prepared statement
   *
   * @return boolean
   */
  public function update($table, $id, array $fields = [])
  {
    $set = '';
    foreach ($fields as $key => $value) {
      $set .= "$key = ?, ";
    }

    $set = rtrim($set, ', ');

    $sql = "UPDATE `$table` SET $set WHERE `id` = $id";

    if (!$this->query($sql, $fields)->error()) {
      return true;
    }

    return false;
  }

  /**
   * Deletes a row from the table.
   *
   * @param string $table - The table to delete the row from
   * @param array  $params - The parameters to use on the prepared statement
   *
   * @return mixed
   */
  public function delete($table, array $params)
  {
    return $this->action('DELETE', $table, $params);
  }

  /**
   * Returns the entire results object.
   *
   * @return array
   */
  public function all()
  {
    return $this->_results;
  }

  /**
   * Returns the first result.
   *
   * @return stdClass
   */
  public function first()
  {
    return $this->_results[0];
  }

  /**
   * Returns the row count.
   *
   * @return int
   */
  public function count()
  {
    return $this->_count;
  }

  /**
   * Returns a boolean value for an error.
   *
   * @return boolean
   */
  public function error()
  {
    return $this->_error;
  }

  /**
   * PRIVATE: Performs an action on a table.
   *
   * @param string $action - The action to run
   * @param string $table  - The table to perform the action on
   * @param array  $params - The parameters of the action
   *
   * @return mixed
   */
  private function action($action, $table, array $params = [])
  {
    if (count($params) === 3) {
      $ops = ['=', '>', '<', '>=', '<='];

      $field = $params[0];
      $op    = $params[1];
      $value = $params[2];

      if (in_array($op, $ops)) {
        $sql = "$action FROM $table WHERE $field $op ?";

        if (!$this->query($sql, [$value])->error()) {
          return $this;
        }
      }
    }

    return false;
  }
}