1:初始化：codecept bootstrap
2:修改测试套件配置codeception.yml,unit.suite.yml
3:修改测试_support提供类命名空间
4:配置 unit.suite.yml支持yii2模块
    modules:
      enabled:
        - Yii2:
            part: [orm,email,fixtures]
  orm: haveRecord/grabRecord/seeRecord/dontSeeRecord
  email: seeEmailsIsSent/grabLastSentEmail
  fixtures：haveFixtures/grabFixture/grabFixtures
  {查看测试命令：codecept g}
5:创建单元测试：codecept g:test unit a
    执行：codecept run unit
6:创建验收测试：codecept g:cest acceptance a
    执行：codecept run acceptance
7:创建功能测试：codecept generate:cept functional a
    执行：codecept run functional
8:测试报告
    codecept run --steps --xml --html
    
9:通过Faker生成测试数据
        'controllerMap' => [
            'fixture' => [
                'class' => 'yii\faker\FixtureController',
                'providers' => [
                    '@console/tests/unit/templates/fixtures',
                ],
                'templatePath' => '@console/tests/unit/templates/fixtures',
                'fixtureDataPath' => '@console/tests/unit/fixtures/data',
            ],
        ],
        执行: php yii fixture/generate-all