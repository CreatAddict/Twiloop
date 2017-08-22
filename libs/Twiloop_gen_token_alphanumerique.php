<?php

/**
 * Récupère l'ip du visiteur
 * @return type
 */
 function Twiloop_gen_token_alphanumerique($length) {
     $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
     $start = 0;
     $token = substr(str_shuffle(str_repeat($alphabet, $length)), $start, $length);
     return $token;
 }
