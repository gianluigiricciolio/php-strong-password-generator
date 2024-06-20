<?php

function generate_password($pw_length)
{

    if (!empty($pw_length)) {
        $password = '';

        $chars = range('a', 'z');
        $upper_chars = range('A', 'Z');
        $nums = range('0', '9');
        $symb = range('!', '/');




        // se unisco tutti in un array:
        // tot = 26 + 26 + 10 + 20; (esempio)
        // prob char = 26/tot;
        // prob upp = 26/tot;
        // prob numb = 10/tot;
        // ,
        // mentre così ogni char_type ha le stesse prob:


        $pass_chars = [
            $chars,
            $upper_chars,
            $nums,
            $symb
        ];

        for ($i = 0; $i < $pw_length; $i++) {
            $first_rand = rand(0, 3);
            $char_type = $pass_chars[$first_rand];
            $rand_char_type = rand(0, count($char_type) - 1);
            $password .= $char_type[$rand_char_type];
        }
    }

    return $password;
};
