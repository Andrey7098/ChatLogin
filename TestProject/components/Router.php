<?php
class Router
{
    private $routes;
    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }
    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }
    
    public function run()
    {
        $uri = $this->getURI();
        
        foreach($this->routes as $uriPattern => $path){
            if(preg_match("~$uriPattern~",$uri)){
                //берем и роутеров знанчение и разбиваем его делая из него массив.
                $internalRoute = preg_replace("~$uriPattern~",$path,$uri);
                $segments = explode('/',$internalRoute);
                unset($segments[1]);
                unset($segments[0]);
                //Получаем название контроллера
                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);
                //Получаем название экшена
                $actionName = 'action'.ucfirst(array_shift($segments));
                
                
                $parametrs = $segments;
                //подключаем нужный контроллер
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                if(file_exists($controllerFile)){
                    include_once($controllerFile);
                }
                //Вызываем контроллер
                $controllerObject = new $controllerName;
                //Вызываем у контроллера экшн
                $result = call_user_func_array(array($controllerObject,$actionName),$parametrs);
                //Если все верно,выходим из цикла
                if($result != null){
                    break;
                }
                
                
            }
        }
        
    }
}