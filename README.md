## 常用函数工具

### 系统工具
```apacheconf
// 单例实例化
$client = \Yii\Helpers\make(\GuzzleHttp\Client::class);
// 单例实例化，带参数
$client = \Yii\Helpers\make(\GuzzleHttp\Client::class, ['base_uri' => 'http://baidu.com']);
// 读取配置文件
echo \Yii\Helpers\config('upload.url');
```


### 时间处理
#### 转中国时间, 默认俄时区
```apacheconf
echo \Yii\Helpers\cnDate("2024-05-01 16:00:00");
```
#### 根据环境转时间
```apacheconf
echo \Yii\Helpers\autoDate("2024-05-01 16:00:00", 'Y-m-d H:i');
```

### 数字格式化
#### 去除浮点数末尾0
```apacheconf
echo \Yii\Helpers\floatRtrimZero('1.30000'); // 1.3
```
