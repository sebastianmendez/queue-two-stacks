<?php
$_fp = fopen("php://stdin", "r");
$i = 0;
$n = fgets($_fp);
$queue = new Queue();

while($i < $n){
    $inst = explode(" ", str_replace(array(PHP_EOL), '', fgets($_fp)));
    $action = $inst[0];
    switch($action){
        case "1":
            $queue->enqueue($inst[1]);
            break;
        case "2":
            $queue->dequeue();
            break;
        case "3":
            $queue->printFront();
            break;
        default:
            break;
    }
    $i++;
}

/* Class to manage the queues using two stacks */
Class Queue{
    protected $s1;
    protected $s2;

    function __construct(){
        $this->s1 = [];
        $this->s2 = [];
    }

    public function enqueue($element){
        $this->s2 = array_reverse($this->s1);
        array_push($this->s2, $element);
        $this->s1 = array_reverse($this->s2);
    }

    public function dequeue(){
        array_pop($this->s1);
    }

    public function printFront(){
        echo end($this->s1) . PHP_EOL;
    }
}

?>
