<?php

namespace MyApp;

class Route
{
   private $path;
   private $methods = [];
   private $module;
   private $action;
   private $params = [];

   /** Enregistre les routes */
   public function __construct($path, $methods, $module, $action, $params = [])
   {
       $this->path = $path;
       $this->methods = $methods;
       $this->module = $module;
       $this->action = $action;
       $this->params = $params;
   }

   public function getPath()
   {
   	   return $this->path;
   }

   public function getMethods()
   {
   	   return $this->methods;
   }

   public function getModule()
   {
   	 return $this->module;
   }

   public function getAction()
   {
   	   return $this->action;
   }

   public function getParams()
   {
   	   return $this->params;
   }
}
