<?php

namespace App\Http\Traits;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Support\Facades\Crypt;

/**
 * Trait for Decrypting ID
 */
trait IDDecrypterTrait
{
    protected function decodeEncryptedId($id)
    {
        try {
            return Crypt::decrypt($id);
        } catch (DecryptException $th) {
            throw $th;
        }
    }

    protected function encryptId($id){
        try {
            return Crypt::encrypt($id);
        } catch (EncryptException $th) {
            throw $th;
        }
    }
}
