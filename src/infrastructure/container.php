<?php

use League\Container\Container;
use League\Container\ReflectionContainer;

return (new Container())->delegate((new ReflectionContainer)->cacheResolutions());
