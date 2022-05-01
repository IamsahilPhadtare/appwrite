<?php

namespace Appwrite\Auth\Hash;

use Appwrite\Auth\Hash;

/*
 * BCrypt accepted options:
 * int cost
 * string? salt; auto-generated if empty
 * 
 * Refference: https://www.php.net/manual/en/password.constants.php
*/
class BCrypt extends Hash
{
    /**
     * @param string $password Input password to hash
     * 
     * @return string hash
     */
    public function hash(string $password): string {
        return \password_hash($password, PASSWORD_BCRYPT, $this->getOptions());
    }

    /**
     * @param string $password Input password to validate
     * @param string $hash Hash to verify password against
     * 
     * @return boolean true if password matches hash
     */
    public function verify(string $password, string $hash): bool {
        return \password_verify($password, $hash);
    }

    /**
     * Get default options for specific hashing algo
     * 
     * @return mixed options named array
     */
    public function getDefaultOptions(): mixed {
        return [ 'cost' => 8 ];
    }
}