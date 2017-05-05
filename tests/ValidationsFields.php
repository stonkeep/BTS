<?php
/**
 * Created by PhpStorm.
 * User: mateus.galasso
 * Date: 03/04/2017
 * Time: 10:46
 */

namespace Tests;

trait ValidationsFields
{
    private function assertValidationError($field)
    {
        $this->assertResponseStatus(422);
        //dd($this->decodeResponseJson());
        $this->assertArrayHasKey($field, $this->decodeResponseJson());
    }
    private function decodeResponseJson()
    {
        return $this->response->decodeResponseJson();
    }
    private function assertResponseStatus($status)
    {
         $this->response->assertStatus($status);
    }
}