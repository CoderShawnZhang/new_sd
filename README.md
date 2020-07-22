 <h1 align="center">搜灯项目开发规范</h1>
 
 
命名规范
-------------------

```
 Modules 模块命名规范
    模块按大方向功能分，例如：商品库，订单，财务。。。
    Goodsm,Orders,Finances
 Controller 控制器命名规范(驼峰)
    class UserOrder
 Action 函数命名规范(驼峰)
     public function actionOrderLog()
 访问：Orders/user-order/order-log
```



DIRECTORY STRUCTURE
-------------------

```
Api
    Config/              Api配置文件
    Controller/          业务转发层
    Middleware/          中间件
    Gateway/             网关
    Modules/             模块
    runtime/             日志
    tests/               单元测试
    web/                 启动目录
common
    config/              项目共用配置
    mail/                邮件模版
    models/              共用模型
    tests/               单元测试
console
    config/              终端配置文件
    controllers/         终端基类控制器
    migrations/          数据迁移
    models/              终端模型
    runtime/             日志
    tests/               单元测试
backend
    assets/              资源文件
    config/              配置文件
    controllers/         基类控制器
    models/              基类模型
    Modules/             模块分类
    runtime/             日志
    tests/               单元测试   
    views/               基类UI
    web/                 启动目录
    widgets/             小部件
frontend
    assets/              资源文件
    config/              配置文件
    controllers/         基类控制器
    models/              基类模型
    runtime/             日志
    tests/               单元测试   
    views/               基类UI
    web/                 启动目录
    widgets/            小部件
vendor/                  contains dependent 3rd-party packages
environments/            环境配置
```
