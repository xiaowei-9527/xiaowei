//第一步，创建我们的启动模块routerApp模块

var routerApp = angular.module('routerApp',['ui.router','loginApp','pageList','addCont','modifyCont','showCont','xg.page']);
// 方便获得当前状态的方法，绑到根作用域
routerApp.run(function($rootScope,$state,$stateParams){
    console.log($state)
    $rootScope.$state = $state;
    $rootScope.$stateParams = $stateParams;
})
// #/0

//routerApp.config配置项
 //$stateProvider 状态供应商，（名字可以看出关于路由的一系列配置需要由$stateProvider完成）
 //$urlRouterProvider 路由重定向
routerApp.config(function($stateProvider,$urlRouterProvider){
    $urlRouterProvider.otherwise('/index');   //路由重定向
    $stateProvider
        //当用户打开整个项目的时候，ui-view中显示的是home.html内容
        .state('index',{
            url:'/index',
            // views:{
            //     '':{
            //         templateUrl:'tpls/home.html'
            //     },
            //     'main@index':{
            //         templateUrl:'tpls/login.html'
            //     }
            // }
            views:{
                '':{
                    templateUrl:'tpls/login.html'
                }
            }
        })
        //文章列表页面
        .state('list',{
            url:'/{type:[0-9]{1,4}}',// /0 /1 /2 /3
            views:{
                '':{
                    templateUrl:'tpls/list.html'
                },
                'type@list':{
                    templateUrl:'tpls/type.html'
                },
                'grid@list':{
                    templateUrl:'tpls/grid.html'
                }
            }
        })
        .state('add',{
            url:'/add',
            views:{
                '':{
                    templateUrl:'tpls/add.html'
                },
                'type@add':{
                    templateUrl:'tpls/type.html'
                },
                'addcon@add':{
                    templateUrl:'tpls/addcon.html'
                }
            }
        })
        .state('modify',{
            url:'/modify/:Id',
            views:{
                '':{
                    templateUrl:'tpls/modify.html'
                },
                'type@modify':{
                    templateUrl:'tpls/type.html'
                },
                'modifycon@modify':{
                    templateUrl:'tpls/modifycon.html'
                }
            }
        })
        .state('show',{
            url:'/show/:Id',
            views:{
                '':{
                    templateUrl:'tpls/show.html'
                },
                'type@show':{
                    templateUrl:'tpls/type.html'
                },
                'showcon@show':{
                    templateUrl:'tpls/showcon.html'
                }
            }
        })
})

