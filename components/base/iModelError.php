<?php

namespace app\components\base;

interface iModelError {

    public function setAttribute();

    public function setMessage();

    public function getAttribute();

    public function getMessage();
}
