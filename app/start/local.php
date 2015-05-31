<?php

/**
 * Compile less
 */
$less = new lessc;
$less->compileFile(__DIR__.'/../../public/less/index.less', __DIR__.'/../../public/css/compiled.css');
