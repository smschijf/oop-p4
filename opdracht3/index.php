<?php

  class User {
    public $username;
    private $email;
    public $role = 'member';
    private $age;

    public function __construct($username, $email, $age)
    {
      $this->username = $username;
      $this->email = $email;
      $this->age = $age;
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

    public function __construct($username, $email, $age, $level)
    {
      $this->level = $level;
      parent::__construct($username, $email, $age);
    }
  }

  $userOne = new User('sander', 'sander@test.nl', 18);
  $userTwo = new AdminUser('brian', 'brian@test.nl',34, 5);
  
  echo $userOne->username . '<br>';
  echo $userOne->getEmail() . '<br>';
  echo $userOne->getAge() . '<br>';
  echo $userOne->role . '<br><br>';
  
  echo $userTwo->username . '<br>';
  echo $userTwo->getEmail() . '<br>';
  echo $userTwo->getAge() . '<br>';
  echo $userTwo->role;
