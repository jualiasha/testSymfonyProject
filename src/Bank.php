<?php


namespace App;




class Bank
{
private $accounts=[];

public function __construct(){
    $this->account=[];
}
    public function addAccount(Account $account)
    {
        //add this account to the aaray of accounts
        $this->accounts[]=$account;
    }

    /**
     * look under the array of aacounts for the one with matching id
     * return the account if found
     * @param int $accountId
     * @return Account
     */

    public function getAccountById(int $accountId)
    {
        return $this->accounts[0];
    }
}