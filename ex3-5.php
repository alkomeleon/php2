<?php
//3.Дан код:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();//1 т.к $х=0, а ++$х=1
$a2->foo();//2 т.к $х=1, а ++$х=2
$a1->foo();//3 т.к $х=2, а ++$х=3
$a2->foo();//4 т.к $х=3, а ++$х=4
//Что он выведет на каждом шаге? Почему?
//    Немного изменим п.5:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo();//1
$b1->foo();//1
$a1->foo();//2
$b1->foo();//2, т.к при наследовании класса создаётся новый, отдельный метод
//4. Объясните результаты в этом случае.
//5. *Дан код:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo();//1
$b1->foo();//1
$a1->foo();//2
$b1->foo();//2, я не поняла, в чём разница между 4 и 5 заданием
//Что он выведет на каждом шаге? Почему?