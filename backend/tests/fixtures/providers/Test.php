<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-28
 * Time: 15:25
 */
namespace backend\tests\fixtures\providers;

use Faker\Provider\Base;

class Test extends Base
{
    public function title($nb = 5)
    {
        $sentence = $this->generator->sentence($nb);
        return mb_substr($sentence,0,mb_strlen($sentence)-1);
    }
}