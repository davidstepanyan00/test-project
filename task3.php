<?php

class CircularDeque {
    private $deque;
    private $front;
    private $rear;
    private $size;
    private $power;

    public function __construct($power) {
        $this->power = $power;
        $this->deque = array_fill(0, $power, null);
        $this->front = 0;
        $this->rear = 0;
        $this->size = 0;
    }

    public function pushBack($value) {
        if ($this->isFull()) {
            return false;
        }
        $this->deque[$this->rear] = $value;
        $this->rear = ($this->rear + 1) % $this->power;
        $this->size++;
        return true;
    }

    public function pushFront($value) {
        if ($this->isFull()) {
            return false;
        }
        $this->front = ($this->front - 1 + $this->power) % $this->power;
        $this->deque[$this->front] = $value;
        $this->size++;
        return true;
    }

    public function popBack() {
        if ($this->isEmpty()) {
            return false;
        }
        $this->rear = ($this->rear - 1 + $this->power) % $this->power;
        $value = $this->deque[$this->rear];
        $this->deque[$this->rear] = null;
        $this->size--;
        return $value;
    }

    public function popFront() {
        if ($this->isEmpty()) {
            return false;
        }
        $value = $this->deque[$this->front];
        $this->deque[$this->front] = null;
        $this->front = ($this->front + 1) % $this->power;
        $this->size--;
        return $value;
    }

    private function isFull() {
        return $this->size == $this->power;
    }

    private function isEmpty() {
        return $this->size == 0;
    }
}

// example

$deque = new CircularDeque(5);
$deque->pushBack(1);
$deque->pushFront(2);
$deque->pushBack(3);
$deque->pushFront(4);
echo $deque->popBack() . "\n";
echo $deque->popFront() . "\n";
echo $deque->popBack() . "\n";
echo $deque->popFront() . "\n";


