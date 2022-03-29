<?php 
class Bank{
    private $pincode;
    private $amount;

   private  function credit($a){
        $this->amount +=$a;
   }

  private  function checkBalance(){
       return 'Balance is '.$this->amount;
   }

   function login($pincode){
       if($pincode == 1234){
           $this->credit(15000);
           echo $this->checkBalance();
       } else {
           echo "invalid pincode";
       }
   }
}
$obj= new Bank();
$obj->login(1234);