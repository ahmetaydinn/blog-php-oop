<?php

namespace app\componets\base;

interface iConnection {

    public function connect($config);

    public function close();
}
