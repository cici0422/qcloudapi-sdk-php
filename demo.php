<?php
require_once './src/QcloudApi/QcloudApi.php';

$config = array('SecretId'       => 'AKIDBAsKWR5ZmiOnvmMfiZAUXJo2ydAZhagV',
                'SecretKey'      => 'Zrsc5GAn9E2ZpnVw6yZtwiDRO4SaR0IJ',
                'RequestMethod'  => 'POST',
                'DefaultRegion'  => 'gz');

$wenzhi = QcloudApi::load(QcloudApi::MODULE_WENZHI, $config);

$package = array('content' => '近日，据媒体报道，继俄罗斯严正警告北约诸国后没多久，美国又开始整幺蛾子了，该国空军再次在乌克兰东部执行了飞行任务，而此时正值拜登普京电话会晤前夕。对此有网友表示，美军提前在边境收集情报，难道是要为冲突做准备吗？

消息人士透露，称这是近段时间以来，美过空军第二次执行类似任务，也是E-8C战场联合监视机第一次飞越乌克兰东部，目的是为了收集俄罗斯地面军事行动相关的情报。事实上，美国非法监视他国的行动一直非常频繁，仅今年一年，抵近中国侦察的军机就多达1200架次。之前，美国牵头，北约与俄罗斯签订了了有助于提升军事透明度，增强各国互信的开放天空条约，但根本上，为的却是方便自己合法窥探他国，不过后来，该国出于对己方情报泄露的担忧，率先退了群。' );

$a = $wenzhi->TextSentiment($package);
// $a = $wenzhi->generateUrl('DescribeInstances', $package);

if ($a === false) {
    $error = $wenzhi->getError();
    echo "Error code:" . $error->getCode() . ".\n";
    echo "message:" . $error->getMessage() . ".\n";
    echo "ext:" . var_export($error->getExt(), true) . ".\n";
} else {
    var_dump($a);
}

echo "Request: " . $wenzhi->getLastRequest();
echo "\nResponse: " . $wenzhi->getLastResponse();
echo "\n";
