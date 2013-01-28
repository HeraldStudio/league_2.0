<?php
return array(
	/*
	
	*名称：配置文件
	
	*功能：项目配置文件
	
	*作者：Tairy
	
	*更新日期：2012.12.17
	
	*/
	
	//'配置项'=>'配置值'
	/* 数据库设置 */
    'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'herald_league', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => 'herald12345678', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'lg_', // 数据库表前缀
	
	/* 分组设置 */
	'APP_GROUP_LIST' => 'User,League,Activity,Admin,Public',      // 项目分组设定,多个组之间用逗号分隔,例如'Home,Admin' 这里的逗号后面千万不能有空格 否则会报错
	'DEFAULT_GROUP'  => 'Activity',  // 默认分组
	
	'URL_MODEL' => 1,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式，提供最好的用户体验和SEO支持
	
	//'DEFAULT_MODULE' => 'Index', // 默认模块名称
    //'DEFAULT_ACTION' => 'index', // 默认操作名称  
	
	// 模板引擎要自动替换的字符串，必须是数组形式。
	'TMPL_PARSE_STRING'     => array(
		'__Public__' =>  'http://localhost/league_2.0/project/herald_league/Public',
		'__Uploads__' => 'http://localhost/league_2.0/project/herald_league/Uploads',
		//'__HeraldLeague__' => 'http://herald.seu.edu.cn/herald_league',
	),
    'DEFAULT_FILTER'=>'strip_tags,htmlspecialchars,htmlencode',//1.21增加 默认的过滤器

    'TOKEN_ON'=>true,  // 开启令牌验证
    'TOKEN_NAME'=>'__hash__',    // 令牌验证的表单隐藏字段名称
    'TOKEN_TYPE'=>'md5',  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'=>true,  //令牌验证出错后是否重置令牌 默认为true

    'SHOW_PAGE_TRACE' =>true,//开启trace
);
?>