## cilicli

### 技术手段
 - [laravel]
 - [redis]
 - [goutte]
 - [queue]
 - [event listener]
 
 ### todo
 - 搜索页
 - 首页前端
 
 ### Log记录
 Log::emergency($error);     //紧急状况，比如系统挂掉
 
 Log::alert($error);     //需要立即采取行动的问题，比如整站宕掉，数据库异常等，这种状况应该通过短信提醒 
 
 Log::critical($error);     //严重问题，比如：应用组件无效，意料之外的异常
 
 Log::error($error);     //运行时错误，不需要立即处理但需要被记录和监控
 
 Log::warning($error);    //警告但不是错误，比如使用了被废弃的API
 
 Log::notice($error);     //普通但值得注意的事件
 
 Log::info($error);     //感兴趣的事件，比如登录、退出
 
 Log::debug($error);     //详细的调试信息
 
 ### 监听队列运行
 php artisan queue:work