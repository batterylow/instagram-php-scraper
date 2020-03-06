<?php

namespace InstagramScraper\TwoStepVerification;

class CodeVerification implements TwoStepVerificationInterface
{

    private $securityCode;


    public function setSecurityCode($securityCode){
        $this->securityCode = $securityCode;
    }

    /**
     * @param array $choices
     * @return string
     */
    public function getVerificationType(array $choices)
    {
        if(!$this->getSecurityCode()){
            if (count($choices) > 1) {


                $selected_choice = $choices[0]['value'];

                    /*$possible_values = [];
                    print 'Select where to send security code' .PHP_EOL;
                    foreach ($choices as $choice) {
                        print $choice['label'] . ' - ' . $choice['value'] .PHP_EOL;
                        $possible_values[$choice['value']] = true;
                    }
                    $selected_choice = null;
                    while (empty($possible_values[$selected_choice])) {
                        if ($selected_choice) {
                            print 'Wrong choice. Try again'.PHP_EOL;
                        }
                        //print 'Your choice: ';
                        //$selected_choice = trim(fgets(STDIN));
                    }*/


            } else {
                print 'Сообщение с кодом авторизации отправлено вам на: ' . $choices[0]['label'] .PHP_EOL;
                $selected_choice = $choices[0]['value'];
            }
        } else {
            $selected_choice = $choices[0]['value'];
        }
        return $selected_choice;
    }

    /**
     * @return string
     */
    public function getSecurityCode()
    {
       /* $security_code = '';
        while (strlen($security_code) !== 6 && !is_int($security_code)) {
            if ($security_code) {
                print 'Wrong security code'.PHP_EOL;
            }
            print 'Enter security code: ';
            $security_code = trim(fgets(STDIN));
        }*/
        return $this->securityCode;
    }
}