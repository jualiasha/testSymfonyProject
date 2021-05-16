<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Account;
use App\Bank;


class BankAccountController extends AbstractController
{
    /**
     * @Route("/bank/account", name="bank_account")
     */
    public function index(): Response
    {
        $bank = new Bank();
        $firstAccount = new Account(1000, 12345);
        $secondAccount = new Account(5000, 123);
        $thirdAccount = new Account(10000, 9999);

        $bank->addAccount($firstAccount);
        $bank->addAccount($secondAccount);
        $bank->addAccount($thirdAccount);


        $bank->getAccountById(9999)->deposit(-1000); // illegal
        $bank->getAccountById(9999)->deposit(1000);

        $bank->getAccountById(123)->withdraw(-10000); // illegal
        $bank->getAccountById(123)->withdraw(10000); // legal, not possible
        $bank->getAccountById(123)->withdraw(1000); // legal, should deduct 1000

        return $this->json([
            'bank_id' => 12345,
            'balance of 9999' => $bank->getAccountById(9999)->getBalance(),

            'deposit -1000' => $bank->getAccountById(9999)->deposit(-1000),
            'deposit 1000' => $bank->getAccountById(9999)->deposit(1000),

            'balance of 123' => $bank->getAccountById(123)->getBalance(),
            'withdraw -10000' => $bank->getAccountById(123)->withdraw(-10000),
            'withdraw 10000' => $bank->getAccountById(123)->withdraw(10000),
            'withdraw 1000' => $bank->getAccountById(123)->withdraw(1000),
        ]);
    }

}
