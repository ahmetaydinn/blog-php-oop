<?php

namespace app\components\base;

interface iConnection {

    public function connect($config);

    public function close($params);
}
