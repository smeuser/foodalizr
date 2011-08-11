<?php // this is an autogenerated file - do not edit (created Thu, 11 Aug 2011 17:17:16 +0200)
spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'foodalizr\\controller\\mealcontroller' => '/controller/MealController.php',
            'foodalizr\\controller\\personcontroller' => '/controller/PersonControler.php',
            'foodalizr\\model\\contribution' => '/model/Contribution.php',
            'foodalizr\\model\\mapperabstract' => '/persistence/MapperAbstract.php',
            'foodalizr\\model\\mapperfactory' => '/persistence/MapperFactory.php',
            'foodalizr\\model\\meal' => '/model/Meal.php',
            'foodalizr\\model\\participation' => '/model/Participation.php',
            'foodalizr\\model\\person' => '/model/Person.php',
            'foodalizr\\model\\spending' => '/model/Spending.php',
            'knid\\http\\header' => '/framework/Knid/Http/Header.php',
            'knid\\http\\request' => '/framework/Knid/Http/Request.php',
            'knid\\http\\response' => '/framework/Knid/Http/Response.php',
            'knid\\io\\exception' => '/framework/Knid/Io/Exception.php',
            'knid\\io\\file' => '/framework/Knid/Io/File.php',
            'knid\\math\\decimal' => '/framework/Knid/Math/Decimal.php',
            'knid\\view' => '/framework/Knid/View.php',
            'knid\\view\\template' => '/framework/Knid/View/Template.php'
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);
