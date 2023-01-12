<?php
require_once 'department.dto.php';
require_once 'city.dto.php';

class UserDto
{
    public $id;
    public $login;
    public CityDto $city;
    public $mail;
    public $avatar;
    public $age;
    public $sexe;
    public DepartmentDto $department;
    public $description;
    public $desire;
    public $desire_datetime;
    public $last_connection;
    public $last_activity;
    public $confirmed_account;

    public function __construct($id, $login, $mail, CityDto $city, DepartmentDto $department, $avatar, $age, $sexe, $description, $desire, $desire_datetime, $last_connection, $last_activity, $confirmed_account=0)
    {
        $this->id = $id;
        $this->login = $login;
        $this->mail = $mail;
        $this->avatar = $avatar;
        $this->avatar = $avatar;
        $this->age = $age;
        $this->sexe = $sexe;
        $this->city = $city;
        $this->department = $department;
        $this->description = $description;
        $this->desire = $desire;
        $this->desire_datetime = $desire_datetime ? new DateTime($desire_datetime, new DateTimeZone("UTC")) : null;
        $this->last_connection = $last_connection ? new DateTime($last_connection, new DateTimeZone("UTC")) : null;
        $this->last_activity = $last_activity ? new DateTime($last_activity, new DateTimeZone("UTC")) : null;
        $this->confirmed_account = (int) $confirmed_account;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getCity() : CityDto
    {
        return $this->city;
    }

    public function getDepartment() : DepartmentDto
    {
        return $this->department;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDesire()
    {
        return $this->desire;
    }

    public function getDesireDateTime()
    {
        return $this->desire_datetime;
    }

    public function getLastConnection()
    {
        return $this->last_connection;
    }

    public function getLastActivity()
    {
        return $this->last_activity;
    }

    public function getDesireRestTime()
    {
        if (!$this->desire_datetime) {
            return 0;
        }
        $now = new DateTime("now", new DateTimeZone("UTC"));
        return (30 * 60) - ($now->format('U') - $this->desire_datetime->format('U'));
    }

    public function isOnline(){
        //Si l'utilisateur ne s'est jamais connecté, il n'est pas online
        if(!$this->last_activity){
            return false;
        }
        //L'utilisateur est en ligne s'il sa last_activity est à moins de 5 minutes
        $now = new DateTime("now", new DateTimeZone("UTC"));
        return ($now->format('U') - $this->last_activity->format('U') <= 300);
    }

    public function isConfirmedAccount(){
        return ($this->confirmed_account == 1);
    }
}
