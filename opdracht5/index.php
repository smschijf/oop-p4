<?php

  class User {
    public $username;
    private $email;
    public $role = 'member';
    private $age;
    protected $gender;

    public function __construct($username, $email, $age, $gender)
    {
      $this->username = $username;
      $this->email = $email;
      $this->age = $age;
      $this->gender = $gender;
    }

    public function addFriend() {
      return "$this->username added a new friend";
    }

    public function getEmail() {
      return $this->email;
    }

    public function getAge() {
      return $this->age;
    }

    public function getGender() {
      return $this->gender;
    }

    public function setEmail($email) {
      if(strpos($email, '@')) {
        $this->email = $email;
      }
    }

    public function setAge($age) {
      if(filter_var($age, FILTER_VALIDATE_INT) === TRUE){
      $this->age = $age;
      }
    }
  }

  class AdminUser extends User{
    public $level;
    public $role = 'admin';

    public function __construct($username, $email, $age, $gender, $level)
    {
      $this->level = $level;
      parent::__construct($username, $email, $age, $gender);
    }
  }

  $userOne = new User('sander', 'sander@test.nl', 19, 'male');
  $userTwo = new AdminUser('brian', 'brian@test.nl', 34, 'male', 5);
  
  echo $userOne->username . '<br>';
  echo $userOne->getEmail() . '<br>';
  echo $userOne->getAge() . '<br>';
  echo $userOne->getGender() . '<br>';
  echo $userOne->role . '<br><br>';
  
  echo $userTwo->username . '<br>';
  echo $userTwo->getEmail() . '<br>';
  echo $userTwo->getAge() . '<br>';
  echo $userTwo->getGender() . '<br>';
  echo $userTwo->role . '<br>';
  echo $userTwo->level;
