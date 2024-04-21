<?php
include_once __DIR__ . "/../config/conn.php";
include_once __DIR__ . "/../entity/setting.php";

class SettingService
{
  private $conn;

  public function __construct()
  {
    global $conn;
    $this->conn = $conn;
  }

  public function create($setting)
  {
    $sql = " INSERT INTO tbSettings(name, logo) VALUES (
      '" . $setting->getName() . "',
      '" . $setting->getLogo() . "'
    )";

    if (!$this->conn->query($sql)) {
      // fail insertion
      return false;
    }

    return $this->conn->insert_id;
  }

  public function getAllSetting()
  {
    $sql = "SELECT id,name,logo,status,createdAt,updatedAt FROM tbSettings";

    $result = $this->conn->query($sql);
    if ($result->num_rows === 0) {
      return false;
    }

    $settings = array();

    while ($row = $result->fetch_assoc()) {
      $setting = $this->fetchToSetting($row);
      $settings[] = $setting;
    }

    return $settings;
  }

  private function fetchToSetting($row)
  {
    $setting = new Setting(
      $row['id'],
      $row['name'],
      $row['logo'],
      $row['status'],
      $row['createdAt'],
      $row['updatedAt']
    );

    return $setting;
  }
}
