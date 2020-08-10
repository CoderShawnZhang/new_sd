<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-03
 * Time: 17:02
 */

namespace Service\Modules\User\Models;

/**
 * Class CreateUserModel
 * @package Service\Modules\User\Models
 * @property string user_name
 * @property string password
 * @property string email
 * @property int role
 * @property int parent_level_1
 * @property int parent_level_2
 * @property double return_money_ratio
 * @property int last_login_at
 * @property int on_line
 * @property int status
 * @property string access_token
 * @property string created_at
 * @property string updated_at
 */
class CreateUserModel extends UserBaseModel
{

}