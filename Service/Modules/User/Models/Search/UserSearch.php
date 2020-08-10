<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-10
 * Time: 09:26
 */
namespace Service\Modules\User\Models\Search;

use Service\Base\SearchModel;
use Service\Modules\User\Models\UserModel;

/**
 * Class UserSearch
 * @package Service\Modules\User\Models\Search
 */
class UserSearch extends SearchModel
{
    /**
     * @var string 用户名属性
     */
    public $username;

    /**
     * @return array
     */
    function rules()
    {
        return [
            [['username'],'string'],
        ];
    }

    /**
     * 构建查询条件
     * @return $this
     */
    public function setCondition()
    {
        $this->query = UserModel::find();
        $this->query->username($this->username);
        return $this;
    }


}