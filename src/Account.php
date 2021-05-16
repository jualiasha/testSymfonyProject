<?php


namespace App;


class Account
{
    private $balance;
    private $id;
public function __construct($balance, $id){
    $this->balance=$balance;
    $this->id=$id;
}
public function getBalance():int{
    return
    $this->balance;
}

    public function deposit(int $int): string
    {
        if($int<0){
            return 'Sorry, you can not deposit amount less then 0';
        } else{
            $newbalance=$int+$this->getBalance();
            return 'Thank you for trust to our services. ' . $int . ' is deposited. Your new account balance is ' . $newbalance;
        }
    }

    public function withdraw(int $param)
    {
        if($param<0){
            return 'Sorry, you can not withdraw amount less then 0';
        } elseif($param>$this->getBalance()){
            return 'Sorry, you have not enough money on your account';
        } else{return 'Thank you for your operaation.' . $param . ' is ready for you';}
    }

}